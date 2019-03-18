<?php

function passwordHash($passwordString)
    {
        $salt="cheese on cheese moon lmsndjfghjokesbghvseowghjhsgegkesh";
        return sha1($salt.$passwordString.$salt);
    }
?>