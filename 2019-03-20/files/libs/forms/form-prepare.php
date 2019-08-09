<?php

/**
 * @return string
 */
function form(): string
{
    $form = getFormSettings();

    $result = sprintf('<form method="%s" action="%s">', $form['method'], $form['action']);

    foreach ($form['inputs'] as $input) {
        $result .= prepareLabel($input['label'], $input['id']);
        $result .= prepareInput($input);
        $result .= prepareError($input['id']);
        $result .= '<br>';
    }

    $result .= '</form>';

    return $result;
}

/**
 * @param array $input
 * @return string
 */
function prepareInput(array $input): string
{
    $result = '<input';
    if ($input['type'] !== null) {
        $result .= ' type="' . $input['type'] . '"';
    }
    if ($input['name'] !== null) {
        $result .= ' name="' . $input['name'] . '"';
    }
    if ($input['id'] !== null) {
        $result .= ' id="' . $input['id'] . '"';
    }
    if ($input['placeholder'] !== null) {
        $result .= ' placeholder="' . $input['placeholder'] . '"';
    }
    if ($input['value'] !== null) {
        $result .= ' value="' . $input['value'] . '"';
    }
    $result .= '>';

    return $result;
}

/**
 * @param string|null $label
 * @param string|null $id
 * @return string
 */
function prepareLabel(?string $label, ?string $id): string
{
    if ($label === null) {
        return '';
    }

    return sprintf('<label for="%s">%s</label>', $id, $label);
}

/**
 * @param string|null $id
 * @return string
 */
function prepareError(?string $id): string
{
    if ($id === null) {
        return '';
    }

    $cookie = $_COOKIE[ERROR_INPUT_NAME . $id] ?? null;
    if ($cookie === null) {
        return '';
    }
    setcookie(ERROR_INPUT_NAME . $id, '', time());

    return '<div style="color: darkred">' . $cookie . '</div>';
}

/**
 * @return array
 */
function getFormSettings(): array
{
    return include 'form-settings.php';
}
