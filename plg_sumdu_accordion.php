<?php
defined( '_JEXEC' ) or die;

class plgContentPlg_sumdu_accordion extends JPlugin
{
	/**
	 * Load the language file on instantiation. Note this is only available in Joomla 3.1 and higher.
	 * If you want to support 3.0 series you must override the constructor
	 *
	 * @var    boolean
	 * @since  3.1
	 */
    protected $autoloadLanguage    = true;
    private static $accordionId    = 0;
    private static $accordionTabId = 0;

	function onContentPrepare($context, &$article, &$params, $limitstart = 0) {
        $pregAccordion = '/(\{accordion\})(.+?)(\{\/accordion\})/s';
        while (preg_match($pregAccordion, $article->text, $segments)) { 
            $accordion = [];
            $pregAccordionTab = '/(\{accordion_tab title\=\")(.+?)(\"})(.+?)(\{\/accordion_tab})/s';
            while (preg_match($pregAccordionTab, $segments[2], $tabSegments)) {
                $accordion[] = [
                    'id'      => self::$accordionTabId,
                    'title'   => $tabSegments[2],
                    'content' => $tabSegments[4],
                ];
                $segments[2] = str_replace($tabSegments[0], '', $segments[2]);
                self::$accordionTabId++;
            }

            $preparedText = '<div class="accordion" id="sumdu_accordion_'. self::$accordionId .'">';
            foreach ($accordion as $tab) {
                $preparedText .= 
                    '<div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#sumdu_accordion_'. self::$accordionId .'" href="#collapse_sumdu_accordion_'. $tab['id'] .'">
                                '. $tab['title'] .'
                            </a>
                        </div>
                        <div id="collapse_sumdu_accordion_'. $tab['id'] .'" class="accordion-body collapse">
                            <div class="accordion-inner">
                                '. $tab['content'] .'
                            </div>
                        </div>
                    </div>';
            }
            $preparedText .= '</div>';

            $article->text = str_replace($segments[0], $preparedText, $article->text);  
            self::$accordionId++;
        }

		return true;
    }
}
?>
