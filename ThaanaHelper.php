
<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ThaanaHelper extends Helper
{
    public function date($format, $timestamp)
    {
        $timestamp = strtotime($timestamp);
        
        $months = array(
            '1' => 'ޖެނުއަރީ',
            '2' => 'ފެބުރުއަރީ',
            '3' => 'މާޗް',
            '4' => 'އޭޕްރީލް',
            '5' => 'މެއި',
            '6' => 'ޖޫން',
            '7' => 'ޖުލައި',
            '8' => 'އޮގަސްޓް',
            '9' => 'ސެޕްޓެމްބަރު',
            '10' => 'އޮކްޓޯބަރ',
            '11' => 'ނޮވެމްބަރު',
            '11' => 'ޑިސެމްބަރު'
        );

        $daysOfWeek = array(
            'އާދިއްތަ',
            'ހޯމަ',
            'އަންގާރަ',
            'ބުދަ',
            'ބުރާސްފަތި',
            'ހުކުރު',
            'ހޮނިހިރު'
        );

        // Get date/time information
        $dateparts = getdate($timestamp);

        // Construct the date in dhivehi using the formatting
        $thaanaDate = '';
        for ($i = 0; $i < strlen($format); $i++) {
            // Check the current char in the format string
            switch ($format[$i]) {
                case 'D':
                case 'l':
                    // Day of the week - short and long
                    $thaanaDate .= $daysOfWeek[$dateparts['wday']];
                    break;
                case 'F':
                case 'M':
                    // Textual representation of month - short and long
                    $thaanaDate .= $months[$dateparts['mon']];
                    break;
                case ' ':
                    $thaanaDate .= ' ';
                    break;
                case '\\':
                    // Escape slashes - get escaped char
                    $i++;
                    $thaanaDate .= $format[$i];
                    break;
                default:
                    $thaanaDate .= date($format[$i], $timestamp);
            }
        }

        return $thaanaDate;
    }
}
