<?php

namespace App\Twig;

use App\Entity\Main\RecPSRTable;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TableExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('origine', [$this, 'formatOrigine']),
        ];
    }

    public function formatOrigine($item, string $param) {
        dump($param);
        switch ($param) {
            case 'origine' :
                usort($item, function(RecPSRTable $item1, RecPSRTable $item2) {
                    if ($item1->getOrigine()->getOrigine() == $item2->getOrigine()->getOrigine()) return 0;
                    return $item1->getOrigine()->getOrigine() < $item2->getOrigine()->getOrigine() ? -1 : 1;
                });
                break;

            case 'dmm' :
                usort($item, function(RecPSRTable $item1, RecPSRTable $item2) {
                    if ($item1->getDmm()->getPole() == $item2->getDmm()->getPole()) return 0;
                    return $item1->getDmm()->getPole() < $item2->getDmm()->getPole() ? -1 : 1;
                });
        }
        

        return $item;
    }

}