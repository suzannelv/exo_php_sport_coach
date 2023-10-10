<?php

const FIRSTNAME_THEN_NAME = 0;
const NAME_THEN_FIRSTNAME = 1;

/**
 * Returns the full name of a given member
 *
 * @param array $member associative array with `name` and `firstname` keys
 * @return string Full name, format : `name firstname`
 */
function getFullName(array $member, $order = NAME_THEN_FIRSTNAME): string
{
    if ($order === FIRSTNAME_THEN_NAME) {
        return $member['firstname'] . ' ' . $member['name'];
    }

    return $member['name'] . ' ' . $member['firstname'];
}



function findAbility(array $abilities, int $id): ?array
{
    $ability = null;

    foreach ($abilities as $element) {
        if ($element['id'] === $id) {
            $ability = $element;

            break;
        }
    }

    return $ability;
}

function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}

// s'inscrire avec succès
function registerEmail(string $emailsFilePath, string $email): void
{
    $emailsFile = fopen($emailsFilePath, 'a');
    fwrite($emailsFile, $email . PHP_EOL);
    fclose($emailsFile);
}

// function pour counter l'utilisateurs inscrits
function getTotalEmail(): int
{
    $emails = file("userinfo.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    return count($emails);

}


// function pour chercher une membre:
function findMembers(array $members, string $search, ?int $abilityId): array
{
    $result = array_filter($members, function (array $member) use ($search): bool {
        return stripos(getFullName($member), $search) !== false;
    });
    // return array_filter($members, fn (array $member): bool => stripos(getFullName($member), $q) !== false);

    if ($abilityId !== null) {
        $result = array_filter($result, function (array $member) use ($abilityId): bool {
            return in_array($abilityId, $member['abilities']);
        });
    }

    return $result;
}
