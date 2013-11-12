<?php
/**
 * This file is part of BcDoctrineBundle.
 * (c) 2013 Florian Eckerstorfer
 */

namespace Bc\Bundle\DoctrineBundle\DQL;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\Parser;
use Doctrine\ORM\Query\SqlWalker;

/**
 * DateFunction
 *
 * Adds the MySQL function DATE() to DQL. The function is defined as follows:
 *
 *     DateFunction ::=  "DATE" "(" ArithmeticPrimary ")"
 *
 * @package    BcDoctrineBundle
 * @subpackage DQL
 * @author     Florian Eckerstorfer <florian@eckerstorfer.co>
 * @copyright  2013 Florian Eckerstorfer
 * @license    http://opensource.org/licenses/MIT The MIT License
 *
 * @codeCoverageIgnore
 */
class DateFunction extends FunctionNode
{
    /** @var string */
    public $dateExpression = null;

    /**
     * {@inheritDoc}
     */
    public function parse(Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->dateExpression = $parser->ArithmeticPrimary();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    /**
     * {@inheritDoc}
     */
    public function getSql(SqlWalker $sqlWalker)
    {
        return sprintf('DATE(%s)', $this->dateExpression->dispatch($sqlWalker));
    }
}
