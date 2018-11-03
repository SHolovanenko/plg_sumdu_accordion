# plg_sumdu_accordion
Plugin (Joomla 3.x) to wrap content into the accordion tabs

To install [Download .zip](https://github.com/SHolovanenko/plg_sumdu_accordion/blob/master/plg_sumdu_accordion.zip) archive, instal it via admin panel on your site (Extensions > Manage > Install > Upload Package File)

Do not forget to turn on plugin after install.

Example text with shortcodes:
```
{accordion}
  {accordion_tab title="First tab"}
    Be careful...
  {/accordion_tab}
  {accordion_tab title="Secon tab"}
    ...shortcodes is sensitive to...
  {/accordion_tab}
  {accordion_tab title="Third tab"}
    ... extra chars and uppercase.
  {/accordion_tab}
{/accordion}
```
