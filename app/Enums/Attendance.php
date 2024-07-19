<?php

namespace App\Enums;

enum Attendance: int
{
    case Unknown = 0;
    case Present = 1;
    case Maybe = 2;
    case Absent = 3;
}
