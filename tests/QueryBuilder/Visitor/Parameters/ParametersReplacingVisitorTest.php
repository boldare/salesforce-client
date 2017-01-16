<?php

namespace Xsolve\SalesforceClient\QueryBuilder\Visitor\Parameters;

use PHPUnit\Framework\TestCase;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractMultiCompare;
use Xsolve\SalesforceClient\QueryBuilder\Expr\Compare\AbstractSingleCompare;

class ParametersReplacingVisitorTest extends TestCase
{
    public function testVisitSingleCompare()
    {
        $visitor = $this->createVisitor([
            'test key 1' => 'test value 1',
            'test key 2' => 'test value 2',
        ]);
        $compare = $this->prophesize(AbstractSingleCompare::class);
        $compare->getLeft()->willReturn('test left with {test key 1}');
        $compare->getRight()->willReturn('{test key 2} of test right');
        $compare->update([
            'left' => 'test left with \'test value 1\'',
            'right' => '\'test value 2\' of test right',
        ])->shouldBeCalled();
        $visitor->visitSingleCompare($compare->reveal());
    }

    public function testVisitMultiCompare()
    {
        $visitor = $this->createVisitor([
            'test key 1' => 'test value 1',
            'test key 2' => 'test value 2',
        ]);
        $compare = $this->prophesize(AbstractMultiCompare::class);
        $compare->getValues()->willReturn([
            'first value with {test key 1}',
            '{test key 2} of second value',
        ]);
        $compare->update([
            'first value with \'test value 1\'',
            '\'test value 2\' of second value',
        ])->shouldBeCalled();
        $visitor->visitMultiCompare($compare->reveal());
    }

    private function createVisitor(array $parameters): ParametersReplacingVisitor
    {
        return new ParametersReplacingVisitor($parameters);
    }
}
