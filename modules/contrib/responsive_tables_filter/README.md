##Description

Enable the "Make tables responsive" text format filter to display field tables responsively using the [Tablesaw Library](https://www.filamentgroup.com/lab/tablesaw.html).

 * For a full description of the module, visit the project page:
   https://drupal.org/project/responsive_tables_filter

##Usage

0. Place this module in your /modules directory and enable it at admin/modules.
1. Go to admin/config/content/formats.
2. Enable the filter "Responsive Tables Filter" on any text formats for which you
want to make tables responsive (e.g., Basic HTML).
3. Verify the text format(s) allow HTML table tags (admin/config/content/formats
> “Limit HTML tags”). All of the following should be allowed:
<table> <th> <tr> <td> <thead> <tbody> <tfoot>

Any fields that use the text format(s) which have tables in them will now be
responsive.

##FAQ

Q: Can I override the tablesaw CSS?

A: Yes, but any CSS you add needs to include the tablesaw naming patterns so that the Javascript can find elements.

Q: Can I target specific tables within nodes?

A: The Drupal 8 version of this module does not yet support xpath query.

Current maintainers:
- Mark Fullmer (mark_fullmer) - https://www.drupal.org/u/mark_fullmer





