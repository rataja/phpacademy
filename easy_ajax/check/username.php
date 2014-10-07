<?php

function randomAnswer()
{
    return rand(0, 1) === 0 ? false : true;
}

echo json_encode(
        array(
            'username' => 'Martin',
            'available' => randomAnswer()
        )
);
