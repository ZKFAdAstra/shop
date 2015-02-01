<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KMT\AAShop\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\CurrencyBundle\Templating\Helper\CurrencyHelper;
use Sylius\Component\Cart\Provider\CartProviderInterface;
use Sylius\Component\Currency\Provider\CurrencyProviderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Sylius\Component\Taxonomy\Model\TaxonInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Intl\Intl;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Sylius\Bundle\WebBundle\Menu\MenuBuilder;

/**
 * Frontend menu builder.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
class FrontendMenuBuilder extends MenuBuilder
{
    /**
     * Currency repository.
     *
     * @var RepositoryInterface
     */
    protected $currencyProvider;

    /**
     * Taxonomy repository.
     *
     * @var RepositoryInterface
     */
    protected $taxonomyRepository;

    /**
     * Cart provider.
     *
     * @var CartProviderInterface
     */
    protected $cartProvider;

    /**
     * Currency converter helper.
     *
     * @var CurrencyHelper
     */
    protected $currencyHelper;

    /**
     * Constructor.
     *
     * @param FactoryInterface          $factory
     * @param SecurityContextInterface  $securityContext
     * @param TranslatorInterface       $translator
     * @param EventDispatcherInterface  $eventDispatcher
     * @param CurrencyProviderInterface $currencyProvider
     * @param RepositoryInterface       $taxonomyRepository
     * @param CartProviderInterface     $cartProvider
     * @param CurrencyHelper            $currencyHelper
     */
    public function __construct(
        FactoryInterface          $factory,
        SecurityContextInterface  $securityContext,
        TranslatorInterface       $translator,
        EventDispatcherInterface  $eventDispatcher,
        CurrencyProviderInterface $currencyProvider,
        RepositoryInterface       $taxonomyRepository,
        CartProviderInterface     $cartProvider,
        CurrencyHelper            $currencyHelper
    )
    {
        parent::__construct($factory, $securityContext, $translator, $eventDispatcher);

        $this->currencyProvider = $currencyProvider;
        $this->taxonomyRepository = $taxonomyRepository;
        $this->cartProvider = $cartProvider;
        $this->currencyHelper = $currencyHelper;
    }


    /**
     * Builds frontend social menu.
     *
     * @param Request $request
     *
     * @return ItemInterface
     */
    public function createSocialMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array(
            'childrenAttributes' => array(
                'class' => 'nav nav-pills pull-right'
            )
        ));

//         $menu->addChild('github', array(
//             'uri' => 'https://github.com/ZKFAdAstra',
//             'linkAttributes' => array('title' => 'ZKF Ad Astra'),
//             'labelAttributes' => array('icon' => 'icon-github-sign icon-large', 'iconOnly' => true)
//         ));
//         $menu->addChild('twitter', array(
//             'uri' => 'https://twitter.com/Sylius',
//             'linkAttributes' => array('title' => $this->translate('sylius.frontend.menu.social.twitter')),
//             'labelAttributes' => array('icon' => 'icon-twitter-sign icon-large', 'iconOnly' => true)
//         ));
        $menu->addChild('facebook', array(
            'uri' => 'http://facebook.com/replaylarp',
            'linkAttributes' => array('title' => 'Replay Larp'),
            'labelAttributes' => array('icon' => 'icon-facebook-sign icon-large', 'iconOnly' => true)
        ));

        $menu->addChild('replay', array(
        		'uri' => 'http://replaylarp.pl',
        		'linkAttributes' => array('title' => 'strona Festiwalu Replay', 'id' => 'replay-social'),
        		'labelAttributes' => array('icon' => 'icon-replay icon-large', 'iconOnly' => true)
        ));
        
        $menu->addChild('adastra', array(
        		'uri' => 'http://adastra.zgora.pl',
        		'linkAttributes' => array('title' => 'ZKF Ad Astra', 'id' => 'adastra-social'),
        		'labelAttributes' => array('icon' => 'icon-large', 'iconOnly' => true)
        ));
        
        $menu->addChild('wielosfer', array(
        		'uri' => 'http://wielosfer.pl',
        		'linkAttributes' => array('title' => 'Stowarzyszenie Wielosfer', 'id' => 'wielosfer-social'),
        		'labelAttributes' => array('icon' => 'icon-large', 'iconOnly' => true)
        ));
        

        return $menu;
    }

}
