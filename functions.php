<?php

function checkForCentury()
{
    $_GET['calc'] = intval($_GET['calc']);
    $currentYear = intval(date('Y'));
    $result = 0;

    $params = range(1800, 2015);
    $flip = array_flip($params);

    if (array_key_exists($_GET['calc'], $flip))
    {
        $result = $currentYear - $_GET['calc'];
    }
    return $result;
}

function checkForLastCenturyShortYear()
{
    $_GET['calc'] = intval($_GET['calc']);
    $currentYear = intval(date('Y'));
    $result = 0;

    if ($_GET['calc'] < 100 && $_GET['calc'] >= 16)
    {
        $dateY = '19' . $_GET['calc'];
        $result = $currentYear - intval($dateY);
    }
    return $result;
}

function checkForThisCenturyShortYear()
{
    $_GET['calc'] = intval($_GET['calc']);
    $currentYear = intval(date('Y'));
    $result = 0;

    if ($_GET['calc'] >= 0 && $_GET['calc'] <= 15)
    {
        if ($_GET['calc'] >= 0 && $_GET['calc'] <= 9)
        {
            $dateY = '200' . $_GET['calc'];
        } 
        else
        {
            $dateY = '20' . $_GET['calc'];
        }
        $result = $currentYear - intval($dateY);
    }
    return $result;
}

function calculateYear() 
{
    if (checkForCentury())
    {
        return checkForCentury();
    }
    elseif (checkForLastCenturyShortYear()) 
    {
        return checkForLastCenturyShortYear();
    }
    elseif (checkForThisCenturyShortYear())
    {
        return checkForThisCenturyShortYear();
    }
}

function is_negative()
{
    if (isset($_GET['calc']) && is_numeric($_GET['calc'])) 
    {
        return($_GET['calc'] < 0);
    } 
    else
    {
        return;
    }
}

function showMessage($message, $kindMessage = 'error')
{
    if (($kindMessage == 'error') && is_string($message))
    {
        echo '<label class="error" >' . $message . '</label>';
    } 
    elseif (($kindMessage == 'success') && is_string($message))
    {
        echo '<label class="success" >' . $message . '</label>';
    } 
    else
    {
        trigger_error('Unknow parametar. Message must be a string or kindMessage must be error or success!');
    }
}
