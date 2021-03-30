<?php
/**
 * Smarty plugin
 *
 * @package    Smarty
 * @subpackage PluginsModifier
 */
/**
 * Smarty truncate modifier plugin
 * Type:     modifier
 * Name:     truncate
 * Purpose:  Truncate a string to a certain length if necessary,
 *               optionally splitting in the middle of a word, and
 *               appending the $etc string or inserting $etc into the middle.
 *
 * @link   http://smarty.php.net/manual/en/language.modifier.truncate.php truncate (Smarty online manual)
 * @author Monte Ohrt <monte at ohrt dot com>
 *
 * @param string  $string      input string
 * @param integer $length      length of truncated text
 * @param string  $etc         end string
 * @param boolean $break_words truncate at word boundary
 * @param boolean $middle      truncate in the middle of text
 *
 * @return string truncated string
 */
function smarty_modifier_truncate($text, $length = 80, $ending = '...', $etc = false, $considerHtml = true)
{
    /* if (Smarty::$_MBSTRING) {
                if (mb_strlen($text, Smarty::$_CHARSET) > $length) {
                    $length -= min($length, mb_strlen($etc, Smarty::$_CHARSET));
                    if (!$break_words && !$considerHtml) {
                        $text = preg_replace(
                            '/\s+?(\S+)?$/' . Smarty::$_UTF8_MODIFIER,
                            '',
                            mb_substr($text, 0, $length + 1, Smarty::$_CHARSET)
                        );
                    }
                    if (!$considerHtml) {
                        return mb_substr($text, 0, $length, Smarty::$_CHARSET) . $etc;
                    }
                    return mb_substr($text, 0, $length / 2, Smarty::$_CHARSET) . $etc .
                           mb_substr($text, -$length / 2, $length, Smarty::$_CHARSET);
                }
                return $text;
    }
        if ($length === 0) {
        return '';
    }
    if (Smarty::$_MBSTRING) {
        if (mb_strlen($string, Smarty::$_CHARSET) > $length) {
            $length -= min($length, mb_strlen($etc, Smarty::$_CHARSET));
            if (!$break_words && !$middle) {
                $string = preg_replace(
                    '/\s+?(\S+)?$/' . Smarty::$_UTF8_MODIFIER,
                    '',
                    mb_substr($string, 0, $length + 1, Smarty::$_CHARSET)
                );
            }
            if (!$middle) {
                return mb_substr($string, 0, $length, Smarty::$_CHARSET) . $etc;
            }
            return mb_substr($string, 0, $length / 2, Smarty::$_CHARSET) . $etc .
                   mb_substr($string, -$length / 2, $length, Smarty::$_CHARSET);
        }
        return $string;
    }
    // no MBString fallback
    if (isset($string[ $length ])) {
        $length -= min($length, strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length + 1));
        }
        if (!$middle) {
            return substr($string, 0, $length) . $etc;
        }
        return substr($string, 0, $length / 2) . $etc . substr($string, -$length / 2);
    }
    return $string; */

    
    if ($considerHtml) {
        // if the plain text is shorter than the maximum length, return the whole text
        if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
            return $text;
        }
        // splits all html-tags to scanable lines
        preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
        $total_length = strlen($ending);
        $open_tags = array();
        $truncate = '';
        foreach ($lines as $line_matchings) {
            // if there is any html-tag in this line, handle it and add it (uncounted) to the output
            if (!empty($line_matchings[1])) {
                // if it's an "empty element" with or without xhtml-conform closing slash
                if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param|i)(\s.+?)?)>$/is', $line_matchings[1])) {
                    // do nothing
                // if tag is a closing tag
                } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                    // delete tag from $open_tags list
                    $pos = array_search($tag_matchings[1], $open_tags);
                    if ($pos !== false) {
                    unset($open_tags[$pos]);
                    }
                // if tag is an opening tag
                } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                    // add tag to the beginning of $open_tags list
                    array_unshift($open_tags, strtolower($tag_matchings[1]));
                }
                // add html-tag to $truncate'd text
                $truncate .= $line_matchings[1];
            }
            // calculate the length of the plain text part of the line; handle entities as one character
            $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
            if ($total_length+$content_length> $length) {
                // the number of characters which are left
                $left = $length - $total_length;
                $entities_length = 0;
                // search for html entities
                if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                    // calculate the real length of all entities in the legal range
                    foreach ($entities[0] as $entity) {
                        if ($entity[1]+1-$entities_length <= $left) {
                            $left--;
                            $entities_length += strlen($entity[0]);
                        } else {
                            // no more characters left
                            break;
                        }
                    }
                }
                $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                // maximum lenght is reached, so get off the loop
                break;
            } else {
                $truncate .= $line_matchings[2];
                $total_length += $content_length;
            }
            // if the maximum length is reached, get off the loop
            if($total_length>= $length) {
                break;
            }
        }
    } else {
        if (strlen($text) <= $length) {
            return $text;
        } else {
            $truncate = substr($text, 0, $length - strlen($ending));
        }
    }
    // if the words shouldn't be cut in the middle...
    if (!$exact) {
        // ...search the last occurance of a space...
        $spacepos = strrpos($truncate, ' ');
        if (isset($spacepos)) {
            // ...and cut the text in this position
            $truncate = substr($truncate, 0, $spacepos);
        }
    }
    // add the defined ending to the text
    $truncate .= $ending;
    if($considerHtml) {
        // close all unclosed html-tags
        foreach ($open_tags as $tag) {
            $truncate .= '</' . $tag . '>';
        }
    }
    return $truncate;

}
