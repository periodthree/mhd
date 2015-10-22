<?php

    function money($amount, $symbol = '$')
    {
        return $symbol . money_format('%i', $amount);
    }


?>