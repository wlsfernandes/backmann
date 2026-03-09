<?php

namespace App\Enums;

enum AboutSection: string
{
  case WHAT_WE_DO = 'what_we_do';
  case WHO_WE_ARE = 'who_we_are';
  case VISION = 'vision';
  case MISSION = 'mission';
  case VALUES = 'values';

  public function label(): string
  {
    return match ($this) {
      self::WHAT_WE_DO => 'What We Do',
      self::WHO_WE_ARE => 'Who We Are',
      self::VISION => 'Our Vision',
      self::MISSION => 'Our Mission',
      self::VALUES => 'Our Values',
    };
  }

  public static function values(): array
  {
    return array_column(self::cases(), 'value');
  }
}
