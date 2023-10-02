<?php

namespace App\Enums;

enum VacancyStatusEnum: string
{
    case OPEN = 'open';
    case CANCELED = 'canceled';

    case FINISHED = 'finished';

}
