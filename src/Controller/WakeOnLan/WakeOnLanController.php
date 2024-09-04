<?php

namespace App\Controller\WakeOnLan;

use App\Business\WakeOnLan\WakeOnLanUseCase;
use App\Controller\WakeOnLan\Dto\WakeOnLanDto;
use App\Controller\WakeOnLan\Request\WakeOnLanRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WakeOnLanController extends AbstractController
{
    public function __construct(
        private readonly WakeOnLanUseCase $wakeOnLanUseCase,
    ) {
    }

    #[Route('/network/lan/wake', name: 'wakeonlan', methods: ['POST'])]
    public function __invoke(WakeOnLanRequest $request): Response
    {
        /** @var WakeOnLanDto $wakeOnLanDto */
        $wakeOnLanDto = $request->getSerializedObject();

        return new Response($this->wakeOnLanUseCase->__invoke($wakeOnLanDto->mac, $wakeOnLanDto->broadcast));
    }
}