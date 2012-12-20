<?php
class Html {
    static function permalink($post) {
    	$date = explode('-', $post->published_at);
    	return sprintf("%s%s/%s/%s", BASE_URL, $date[0], $date[1], $post->slug);
    }
    
    static function reldate($str) {
        $ptime = strtotime($str);

        $etime = time() - $ptime;
    
        if ($etime < 1) {
            return '0 seconds';
        }
        
        $a = array( 12 * 30 * 24 * 60 * 60  =>  'año',
                    30 * 24 * 60 * 60       =>  'mes',
                    24 * 60 * 60            =>  'día',
                    60 * 60                 =>  'hora',
                    60                      =>  'minuto',
                    1                       =>  'segundo'
                    );
        
        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '');
            }
        }
    }
}