<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Event;

/**
* Event constants for HivataliKapuBundle
*/
class HivataliKapuEvents
{
	/**
	 * Hivatali kapu soap csatlakozas alkalmával van kilőve
	 */
    const HKP_API_CONNECTION = 'hivatali_kapu.api.connection';

    /**
	 * Hivatali kapu soap csatlakozas alkalmával van kilőve
	 */
    const HKP_KR_DECRYPT = 'hivatali_kapu.kr.decrypt';

    /**
     *
     * események még:
     * - az egyes soap hívások külön-külön
     * 
     */
    const HKP_API_DOKUMENTUMOK_LEKERDEZESE 	= 'hivatali_kapu.api.dokuentumok_lekerdezese';

    const HKP_API_POSTAFIOK_LEKERDEZESE 	= 'hivatali_kapu.api.postafiok_lekerdezese';
}
