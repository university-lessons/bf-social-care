<?php

namespace App\Helpers;

class SubjectHelper
{
    private static $degrees = [
        'mother' => 'Mãe',
        'father' => 'Pai',
        'relative' => 'Parente próximo(a)',
        'friend' => 'Amigo(a)',
    ];

    private static $colors = [
        ' ' => 'Não informada',
        'preto' => 'Preto(a)',
        'pardo' => 'Pardo(a)',
        'indigeno' => 'Indígeno(a)',
        'branco' => 'Branco(a)',
        'amarelo' => 'Amarelo(a)',
    ];

    private static $incomes = [
        ' ' => 'Não informada',
        'zero' => 'Sem rendimento',
        '2900' => 'Até R$ 2900',
        '7100' => 'De R$ 2900 a R$ 7100',
        '22000' => 'De R$ 7100 a R$ 22000',
        'superior' => 'Superior a R$ 22000',
    ];

    public static function getCloseRelativeDegreeOptions($selected = null)
    {
        $options = [];

        foreach (self::$degrees as $value => $label) {
            $selectedAttr = $value === $selected ? 'selected' : '';
            $options[] = "<option value=\"$value\" $selectedAttr>$label</option>";
        }

        return implode("\n", $options);
    }

    public static function getCloseRelativeDegree($degree)
    {
        return self::$degrees[$degree] ?? $degree;
    }

    public static function getSubjectColorOptions($selected = null)
    {
        $options = [];

        foreach (self::$colors as $value => $label) {
            $selectedAttr = $value === $selected ? 'selected' : '';
            $options[] = "<option value=\"$value\" $selectedAttr>$label</option>";
        }

        return implode("\n", $options);
    }

    public static function getSubjectColor($color)
    {
        return self::$colors[$color] ?? $color;
    }

    public static function getSubjectIncomeOptions($selected = null)
    {
        $options = [];

        foreach (self::$incomes as $value => $label) {
            $selectedAttr = $value === $selected ? 'selected' : '';
            $options[] = "<option value=\"$value\" $selectedAttr>$label</option>";
        }

        return implode("\n", $options);
    }

    public static function getSubjectIncome($income)
    {
        return self::$incomes[$income] ?? $income;
    }
}
