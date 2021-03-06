(function (_, $, Drupal, drupalSettings) {

  /**
   * Method for executing JS callback requests; wraps $.ajax().
   *
   * @param {object} options
   *   The default option to pass to the $.ajax() method.
   *
   * @return {JsAjax}
   */
  var JsAjax = function (options) {
    this.defaults = options || {};
    this.options = options || {};

    var $trigger = options.$trigger && $(options.$trigger) || $();

    // Merge defaults with supplied options.
    this.options = $.extend(true, {
      type: 'GET',
      dataType: 'json',
      data: Drupal.JS.snakeCaseObject($trigger.data() || {}),
      ignoreData: [],
      $trigger: $trigger
    }, options);

    // Filter out any data that should be ignored.
    var ignoreData = $.extend(true, [], this.options.ignoreData, this.options.data.js_ignore_data);
    if (ignoreData.length) {
      this.options.data = _.omit(this.options.data, ignoreData);
    }
    delete this.options.data.js_ignore_data;

    // Ensure URL is always set to the endpoint. This must override any value
    // provided by the user since this is handled by the JS Callback route.
    this.options.url = Drupal.JS.url(Drupal.JS.settings.endpoint);

    // Trigger an init event.
    this.trigger('init');

    // Provide a unique identifier that this is a "JS Callback" $.ajax instance.
    this.options._jsInstance = this;

    this.options.jsModal = true;

    // Create a Drupal.ajax() object programmatically.
    this.ajax = Drupal.ajax({
      dialogType: this.options.jsModal && 'modal' || this.options.jsDialog && 'dialog' || null,
      url: this.options.url
    });

    // Set URL to the one auto-generated by Drupal.ajax.
    this.options.url = this.ajax.options.url;

    // Extend the ajax options.
    $.extend(this.ajax.options, this.options);

    // Override core's "complete" handler so it doesn't error out.
    this.ajax.options.complete = function () {
      this.ajax.ajaxing = false;
    }.bind(this);

    // Catch Drupal.AjaxError messages so they're actually displayed.
    var errorHandler = this.ajax.error;
    this.ajax.error = function (xmlhttprequest, uri, customMessage) {
      try {
        errorHandler.apply(this, [xmlhttprequest, uri, customMessage]);
      }
      catch (e) {
        Drupal.JS.messages
          .prepend(Drupal.theme('statusMessages', {error: [e.message.replace(/\n/g, '<br>')]}))
          .trigger('loaded');
      }
    };

    // Override the redirect command.
    this.ajax.commands.redirect = this.redirect.bind(this);

    // Execute the request.
    this.ajax.execute();

    return this;
  };

  JsAjax.prototype.redirect = function (ajax, response, status) {
    var url = Drupal.url.toAbsolute(response.url);

    // Redirect internal JS Callback requests via Ajax.
    if (response.force !== void 0 && !response.force && Drupal.url.isLocal(url)) {
      var opt = $.extend({}, this.options);
      this.redirecting = true;
      // Redirects do not process any information, change the type back to
      // GET, remove the data and set the new URL.
      opt.type = 'GET';
      opt.data[opt.data.js_callback === 'js.content' ? 'path' : 'url'] = url;
      Drupal.JS.ajax(opt);
      return;
    }

    // Otherwise redirect the entire page.
    window.location = url;
  };


  /**
   * Internal AJAX handler.
   *
   * Iterates over each JS.behavior and fires the appropriate method if it
   * exists.
   *
   * @param {string} type
   *   The type of event, should be one of: beforeSend, error, success or
   *   complete.
   * @param {Event} [event]
   *   The native Event object.
   * @param {XMLHttpRequest} [jqXHR]
   *   The jQuery XMLHttpRequest object.
   * @param {object} [options]
   *   The jQuery AJAX options.
   */
  JsAjax.prototype.trigger = function (type, event, jqXHR, options) {
    var i, l;

    // Older versions of jQuery do not have jqXHR.responseJSON, we must parse
    // the responseText manually.
    var json = jqXHR && options.dataType === 'json' && jqXHR.responseJSON || {};

    // Process our own internal events (so they cannot be overridden).
    switch (type) {
      case 'beforeSend':
        Drupal.JS.messages.html('');
        this.ajaxing = true;
        this.redirecting = false;
        this.options.$trigger.removeClass('error').addClass('ajaxing disabled').prop('disabled', true);
        break;

      case 'error':
      case 'success':
        var commands = json.commands || [];
        if (commands.length) {
          for (i = 0, l = commands.length; i < l; i++) {
            var command = commands[i];
            if (this.ajax.commands[command.command]) {
              this.ajax.commands[command.command].apply(this, [{}, command, jqXHR.statusText, json]);
            }
          }
        }

        // Return if redirecting.
        if (this.redirecting) {
          return;
        }

        // Parse and display any Drupal messages set.
        if (json.messages) {
          Drupal.JS.messages
            .prepend(Drupal.theme('statusMessages', json.messages))
            .trigger('loaded');
        }
        break;

      case 'complete':
        this.options.$trigger.removeClass('ajaxing disabled').prop('disabled', false);
        this.ajaxing = false;
        break;
    }

    // Iterate over AJAX behaviors.
    var args = [event, jqXHR, options, json];
    for (i in Drupal.JS.behaviors) {
      if (Drupal.JS.behaviors.hasOwnProperty(i) && typeof Drupal.JS.behaviors[i] === 'object') {
        if (typeof Drupal.JS.behaviors[i][type] !== 'undefined' && typeof Drupal.JS.behaviors[i][type] === 'function') {
          Drupal.JS.behaviors[i][type].apply(this, args);
        }
      }
    }

    // Remove the instance.
    if (type === 'complete') {
      delete Drupal.JS.instances[options._jsInstance];
    }
  };

  /**
   * Instantiate the global JS object.
   */
  Drupal.JS = {

    /**
     * Initiates a new instance of JsAjax; wrapper for $.ajax().
     *
     * @param options
     *   The $.ajax() options to use.
     */
    ajax: function (options) {
      var instance;
      options = options || {};
      // Save this instance using a new identifier.
      options._jsInstance = this.instanceCount++;
      instance = this.instances[options._jsInstance] = new JsAjax(options);
      return instance.jqXHR;
    },

    /**
     * Wraps Drupal.url so it can strip of any leading forwards slashes.
     *
     * @param {String} path
     *   The URL path.
     *
     * @return {String}
     *   A properly constructed relative URL for Drupal.
     */
    url: function (path) {
      // Strip off any leading forward slash and pass through core's URL helper.
      return Drupal.url(path.replace(/^\//, ''));
    },

    /**
     * Contains the active JsAjax instances.
     * @type {object}
     */
    instances: {},

    /**
     * A counter for uniquely identifying active JsAjax instances.
     * @type {object}
     */
    instanceCount: 0,

    /**
     * Contains event behaviors to be used during active JsAjax instances.
     * @type {object}
     * @see JsAjaxBehaviors
     */
    behaviors: {},

    /**
     * A placeholder. This is initialized on DOM ready.
     * @type {jQuery}
     */
    messages: $(),

    /**
     * The JS Callback settings.
     *
     * @type {Object}
     */
    settings: $.extend({
      endpoint: '/js',
      tokens: {}
    }, drupalSettings.js),

    /**
     * The selector used to identify where messages should be placed.
     *
     * The last selector found (in order of the DOM tree) will be used. Themes
     * can override this with a single specific selector if a guaranteed element
     * will be present.
     *
     * @type {string}
     */
    messagesSelector: 'body, #main, #content, #block-system-main, #messages',

    getToken: function (callback) {
      return callback && this.settings.tokens[callback] || '';
    },

    /**
     * Helper method for processing names and values of form elements.
     *
     * @param {Node|jQuery} element
     *   The DOM node or jQuery element. It can can be a single form element or
     *   if a higher element is passes (like a form), then all input elements
     *   found inside it will be added to the data array.
     *
     * @returns {object}
     *   The data to use.
     */
    processFormValues: function (element) {
      var $elements = $(), data = {};
      if ($(element).is(':input')) {
        $elements = $elements.add(element);
      }
      else {
        $elements = $elements.add($(element).find(':input'));
      }
      $elements.each(function () {
        var $input = $(this);
        var name = $input.attr('name') || $input.attr('id') || null;
        var value = $input.is(':checkbox') ? ($input.is(':checked') ? $input.val() : 0) : $input.val();
        if (name) {
          data[name] = value;
        }
      });
      return data;
    },

    /**
     * Converts object keys from jsonLowerCamelCase to drupal_php_snake_case.
     *
     * @param {object} obj
     *   The object to iterate over.
     */
    snakeCaseObject: function (obj) {
      var array = _.isArray(obj);
      var ret = array ? [] : {};
      _.each(obj, function (value, key) {
        // Skip functions entirely.
        if (_.isFunction(value)) {
          return;
        }

        // Typecast key to string.
        key = key + '';

        // Snake case the key, if necessary.
        var snakeCaseKey = key.replace(/([A-Z])/g, '_$1').toLowerCase();
        if (snakeCaseKey !== key) {
          key = snakeCaseKey;
        }

        // Recurse if an object or array.
        if (_.isObject(value) || _.isArray(value)) {
          value = this.snakeCaseObject(value);
        }
        // Sanitize value if not undefined or null.
        else if (value !== void 0 && value !== null) {
          value = Drupal.checkPlain(value);
        }

        // Store the value.
        if (array) {
          ret.push(value);
        }
        else {
          ret[key] = value;
        }
      }.bind(this));

      return ret;
    }

  };

  /**
   * Register global events.
   */
  $(document)
    // jQuery AJAX events.
    .ajaxSend(function(event, jqXHR, options) {
      if (options._jsInstance instanceof JsAjax) {
        options._jsInstance.trigger('beforeSend', event, jqXHR, options);
      }
    })
    .ajaxError(function(event, jqXHR, options) {
      if (options._jsInstance instanceof JsAjax) {
        options._jsInstance.trigger('error', event, jqXHR, options);
      }
    })
    .ajaxSuccess(function(event, jqXHR, options) {
      if (options._jsInstance instanceof JsAjax) {
        options._jsInstance.trigger('success', event, jqXHR, options);
      }
    })
    .ajaxComplete(function (event, jqXHR, options) {
      if (options._jsInstance instanceof JsAjax) {
        options._jsInstance.trigger('complete', event, jqXHR, options);
      }
    })
    // Attach the messages element when the DOM is ready.
    .ready(function () {
      Drupal.JS.messages = $('<div class="js-messages"></div>').prependTo($(Drupal.JS.messagesSelector).last());
    });

  /**
   * jQuery plugin for processing form requests.
   *
   * @param {object} [options]
   *   Any additional options to pass to the jQuery.ajax() call.
   *
   * @return {jQuery}
   *   The chainable jQuery object.
   */
  $.fn.jsForm = function (options) {
    var $form = $(this);
    if (!$form.is('form')) {
      return $form;
    }

    options = typeof options === 'object' && options || {};

    var $trigger = $();

    $form
      .on('click', ':button', function () {
        $trigger = $(this);
      })
      .on('submit', function (e) {
        // Prevent the form submission.
        e.preventDefault();

        // Get form values.
        var data = Drupal.JS.processFormValues($form);

        // Override any callback value so this is processed internally.
        data['js_callback'] = 'js.content';

        // Override submitted operation.
        if ($trigger.is('[name=op]')) {
          data.op = $trigger.val();
        }

        var url = $form.attr('action');
        if (url) {
          data.path = url;
        }

        // Send the request.
        Drupal.JS.ajax($.extend(true, {
          type: ($form.attr('method') || 'POST').toUpperCase(),
          data: data,
          $trigger: $trigger
        }, options));
      })
    ;

    return $form;
  };

  /**
   * Core template for theming status messages.
   */
  Drupal.theme.prototype.statusMessages = function (messages) {
    var output = '';
    var status_heading = {
      status: Drupal.t('Status message'),
      error: Drupal.t('Error message'),
      warning: Drupal.t('Warning message')
    };
    for (var type in messages) {
      if (!messages.hasOwnProperty(type)) {
        continue;
      }
      if (messages[type].length > 0) {
        output += "<div class=\"messages " + type + "\">\n";
        if (typeof(status_heading[type]) !== 'undefined') {
          output += '<h2 class="element-invisible">' + status_heading[type] + "</h2>\n";
        }
        if (messages[type].length > 1) {
          output += " <ul>\n";
          for (var i in messages[type]) {
            output += '  <li>' +  messages[type][i] + "</li>\n";
            // Remove the message from the array so it's not processed again.
            delete messages[type][i];
          }
          output += " </ul>\n";
        }
        else {
          output += messages[type][0];
        }
        output += "</div>\n";
      }
    }
    return output;
  };

})(_, jQuery, Drupal, drupalSettings);
