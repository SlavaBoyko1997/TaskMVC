<?php

return [
  'required' => [
      'email',
      'password',
  ],
  'lengthMin' => [['password',6]],
    'equals' => [
        ['password', 'confirm_password']
    ],
    'regex' => [
        ['email', '/[[a-zA-Z0-9]{3,20}[@][a-zA-Z]{3}$/'],
        ['password', '/[!]/'],
    ]
];