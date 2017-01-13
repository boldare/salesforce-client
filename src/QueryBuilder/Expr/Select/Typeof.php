<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Expr\Select;

use Xsolve\SalesforceClient\QueryBuilder\Expr\ExprInterface;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof\ElseClause;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Select\Typeof\WhenClause;

class Typeof extends AbstractSelect implements ExprInterface
{

    /**
     * @var string
     */
    protected $field;

    /**
     * @var WhenClause[]
     */
    protected $whenClauses;

    /**
     * @var ElseClause|null
     */
    protected $elseClauses;

    public function __construct(string $field, array $whenClauses, ElseClause $elseClauses = null)
    {
        $this->field = $field;
        $this->whenClauses = $whenClauses;
        $this->elseClauses = $elseClauses;
    }

    /**
     * {@inheritdoc}
     */
    protected function getSelectPart(): string
    {
        $result = sprintf('TYPEOF %s%s', $this->field, $this->getWhen());

        if (null === $this->elseClauses) {
            return sprintf('%s END', $result);
        }

        return sprintf('%s%s END', $result, $this->elseClauses->asSOQL());
    }

    protected function getWhen(): string
    {
        $when = '';

        foreach ($this->whenClauses as $whenClause) {
            $when .= $whenClause->asSOQL();
        }

        return $when;
    }
}
