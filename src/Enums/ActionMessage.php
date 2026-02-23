<?php

namespace Redis\Enums;


enum ActionMessage: string {
    case GOOD = "True";

    case BAD = "(nil)";
}