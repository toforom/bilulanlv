<?php 
return array (
  'get' => 
  array (
    'captcha/[:id]' => 
    array (
      'rule' => 'captcha/[:id]',
      'route' => '\think\captcha\CaptchaController@index',
      'var' => 
      array (
        'id' => 2,
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'post' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'put' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'delete' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'patch' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'head' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  'options' => 
  array (
    'hello' => true,
    'diary/:id' => true,
    'article/:id' => true,
    'diary' => true,
    'article' => true,
    'link' => true,
    'message' => true,
    'task' => true,
  ),
  '*' => 
  array (
    'hello' => 
    array (
      'rule' => 
      array (
        0 => 
        array (
          'rule' => ':id',
          'route' => 'index/hello',
          'var' => 
          array (
            'id' => 1,
          ),
          'option' => 
          array (
            'method' => 'get',
          ),
          'pattern' => 
          array (
            'id' => '\d+',
          ),
        ),
        1 => 
        array (
          'rule' => ':name',
          'route' => 'index/hello',
          'var' => 
          array (
            'name' => 1,
          ),
          'option' => 
          array (
            'method' => 'post',
          ),
          'pattern' => 
          array (
          ),
        ),
      ),
      'route' => '',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'diary/:id' => 
    array (
      'rule' => 'diary/:id',
      'route' => 'index/DiaryPage/index',
      'var' => 
      array (
        'id' => 1,
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'article/:id' => 
    array (
      'rule' => 'article/:id',
      'route' => 'index/ArticlePage/index',
      'var' => 
      array (
        'id' => 1,
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'diary' => 
    array (
      'rule' => 'diary',
      'route' => 'index/Diary/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'article' => 
    array (
      'rule' => 'article',
      'route' => 'index/Article/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'link' => 
    array (
      'rule' => 'link',
      'route' => 'index/Link/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'message' => 
    array (
      'rule' => 'message',
      'route' => 'index/Message/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
    'task' => 
    array (
      'rule' => 'task',
      'route' => 'index/Task/index',
      'var' => 
      array (
      ),
      'option' => 
      array (
      ),
      'pattern' => 
      array (
      ),
    ),
  ),
  'alias' => 
  array (
  ),
  'domain' => 
  array (
  ),
  'pattern' => 
  array (
    'name' => '\w+',
  ),
  'name' => 
  array (
    '\think\captcha\captchacontroller@index' => 
    array (
      0 => 
      array (
        0 => 'captcha/[:id]',
        1 => 
        array (
          'id' => 2,
        ),
        2 => NULL,
      ),
    ),
    'index/hello' => 
    array (
      0 => 
      array (
        0 => 'hello/:id',
        1 => 
        array (
          'id' => 1,
        ),
        2 => NULL,
      ),
      1 => 
      array (
        0 => 'hello/:name',
        1 => 
        array (
          'name' => 1,
        ),
        2 => NULL,
      ),
    ),
    'index/diarypage/index' => 
    array (
      0 => 
      array (
        0 => 'diary/:id',
        1 => 
        array (
          'id' => 1,
        ),
        2 => NULL,
      ),
    ),
    'index/articlepage/index' => 
    array (
      0 => 
      array (
        0 => 'article/:id',
        1 => 
        array (
          'id' => 1,
        ),
        2 => NULL,
      ),
    ),
    'index/diary/index' => 
    array (
      0 => 
      array (
        0 => 'diary',
        1 => 
        array (
        ),
        2 => NULL,
      ),
    ),
    'index/article/index' => 
    array (
      0 => 
      array (
        0 => 'article',
        1 => 
        array (
        ),
        2 => NULL,
      ),
    ),
    'index/link/index' => 
    array (
      0 => 
      array (
        0 => 'link',
        1 => 
        array (
        ),
        2 => NULL,
      ),
    ),
    'index/message/index' => 
    array (
      0 => 
      array (
        0 => 'message',
        1 => 
        array (
        ),
        2 => NULL,
      ),
    ),
    'index/task/index' => 
    array (
      0 => 
      array (
        0 => 'task',
        1 => 
        array (
        ),
        2 => NULL,
      ),
    ),
  ),
);