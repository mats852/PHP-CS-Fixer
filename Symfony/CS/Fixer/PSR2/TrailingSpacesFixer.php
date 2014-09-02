<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Fixer\PSR2;

use Symfony\CS\FixerInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TrailingSpacesFixer implements FixerInterface
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        // [Structure] Don't add trailing spaces at the end of non-blank lines
        return preg_replace('/(?<=\S)\h+$/m', '', $content);
    }

    /**
     * {@inheritdoc}
     */
    public function getLevel()
    {
        // defined in PSR2 ¶2.3
        return FixerInterface::PSR2_LEVEL;
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        return 20;
    }

    /**
     * {@inheritdoc}
     */
    public function supports(\SplFileInfo $file)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'trailing_spaces';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Remove trailing whitespace at the end of non-blank lines.';
    }
}
