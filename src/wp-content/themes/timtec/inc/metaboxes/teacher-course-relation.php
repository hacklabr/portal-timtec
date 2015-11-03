<?php

global $teacher_course_relation;

$teacher_course_relation = new ManyToManyRelation(array(
            'post_type1' => 'teacher',
            'post_type2' => 'course',
            'title1' => __('Courses', SLUG),
            'title2' => __('Teachers', SLUG),
            'placeholder1' => __('search courses by name', SLUG),
            'placeholder2' => __('search teachers by name', SLUG),
            'context' => 'side'
        ));