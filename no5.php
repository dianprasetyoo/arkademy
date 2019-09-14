<?php
function cetak($panjang = 32, $chars = '1234567890abcdefghijklmnopqrstuvwxyz')
{
    if($panjang > 0)
    {
        $len_chars = (strlen($chars) - 1);
        $the_chars = $chars{mt_rand(0, $len_chars)};
        for ($i = 1; $i < $panjang; $i = strlen($the_chars))
        {
            $r = $chars{rand(0, $len_chars)};
            if ($r != $the_chars{$i - 1}) $the_chars .=  $r;
        }

        return $the_chars;
    }
}

echo cetak();
//echo $cek;
?>
