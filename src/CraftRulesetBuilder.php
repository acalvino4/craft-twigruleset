<?php

use FriendsOfTwig\Twigcs\RegEngine\RulesetBuilder;

class CustomRulesetBuilder extends RulesetBuilder
{
    /**
     * An override of a parent function for the purpose of adding an allowed operator
     * @return array<string, array<int, mixed>>
     */
    public function build(): array
    {
        $newOps = $this->using(self::OP_VARS, [['$➀\?\?\?➁$', $this->binaryOpSpace('???')]]);

        $build = parent::build();
        $expr = $build['expr'];
        $build['expr'] = array_merge(
            $newOps,
            $expr,
        );
        return $build;
    }
}
