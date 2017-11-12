<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

    'classes' => 'index/classes/index',
    'class/deletec/:id' => 'index/classes/deletec',
    'class/addclasses' => 'index/classes/addclasses',
    'class/addc' => 'index/classes/addc',
    'class/editclasses/:id' => 'index/classes/editclasses',
    'class/editc/:id' => 'index/classes/editc',

    'teacher' => 'index/teacher/index',
    'teachers/deletet/:id' => 'index/teacher/deletet',
    'teachers/addteacher' => 'index/teacher/addteacher',
    'teachers/addt' => 'index/teacher/addt',
    'teachers/editteacher/:id' => 'index/teacher/editteacher',
    'teachers/editt/:id' => 'index/teacher/editt',

    'course' => 'index/course/index',
    'courses/deleteco/:id' => 'index/course/deleteco',
    'courses/addcourse' => 'index/course/addcourse',
    'courses/addco' => 'index/course/addco',
    'courses/editcourse/:id' => 'index/course/editcourse',
    'courses/editco/:id' => 'index/course/editco',

    'student' => 'index/student/index',
    'students/adds' => 'index/student/adds',
    'students/addstudent' => 'index/student/addstudent',
    'students/deletes/:id' => 'index/student/deletes',
    'students/edits/:id' => 'index/student/edits',
    'students/editstudent/:id' => 'index/student/editstudent',

    'ba/:id' => 'demo/ba/index',
    'tie/:id' => 'demo/tie/index',
    'ties/gentie/:id' => 'demo/tie/gentie',
    'tie/addtie' => 'demo/tie/addtie',
    'tie/addt' => 'demo/tie/addt',
    'ties/gent' => 'demo/tie/gent',
    'ties/huifutie/:id' => 'demo/tie/huifutie',
    'ties/huifut' => 'demo/tie/huifut',
];
