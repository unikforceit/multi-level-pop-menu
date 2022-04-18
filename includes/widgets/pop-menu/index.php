<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class multi_level_pop_menu_addons extends Widget_Base
{

    public function get_name()
    {
        return 'multi_level_pop_menu_addons';
    }

    public function get_title()
    {
        return __('Multi level pop menu addons', 'multi-level-pop-menu');
    }

    public function get_icon()
    {
        return 'eicon-nav-menu';
    }

    public function get_categories()
    {
        return array('multi-level-pop-menu-addons');
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Multi level pop menu', 'multi-level-pop-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $helper = new \Mlpm_Helper();
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'multi-level-pop-menu'),
                'type' => Controls_Manager::SELECT2,
                'options' => $helper->get_wp_menus(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_icon',
            [
                'label' => esc_html__( 'Show Title', 'multi-level-pop-menu' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Button', 'multi-level-pop-menu' ),
                'label_off' => esc_html__( 'Icon', 'multi-level-pop-menu' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'btn',
            [
                'label' => esc_html__( 'Button', 'multi-level-pop-menu' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Open', 'multi-level-pop-menu' ),
                'condition' => [
                        'btn_icon' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__( 'Icon', 'multi-level-pop-menu' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => [
                    'btn_icon' => '',
                ],
                'default' => [
                    'value' => 'fas fa-bars',
                    'library' => 'solid',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'menu_style',
            [
                'label' => __('Main Menu', 'multi-level-pop-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'btntxt',
            [
                'label' => __('Button Text', 'multi-level-pop-menu'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} button.btn-open.first' => 'font-size: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} button.btn-open.first svg' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fontsaaa',
                'label' => __('Button Typography', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} button.btn-open.first',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __('Button Color', 'multi-level-pop-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} button.btn-open.first' => 'color: {{VALUE}}',
                    '{{WRAPPER}} button.btn-open.first svg' => 'fill: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'nav_fontsaaaas',
                'label' => __('Button Border', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} button.btn-open.first',
            ]
        );
        $this->add_responsive_control(
            'sdpdaaaabb',
            [
                'label' => esc_html__('Button Border', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} button.btn-open.first' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'sdpdaaa',
            [
                'label' => esc_html__('Button Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} button.btn-open.first' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgaa',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} button.btn-open.first',
            ]
        );
        $this->add_responsive_control(
            'menu_align',
            [
                'label' => __('Menu Alignment', 'multi-level-pop-menu'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'multi-level-pop-menu'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'multi-level-pop-menu'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'multi-level-pop-menu'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .multi-level-pop-menu-addons main' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __('Color', 'multi-level-pop-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .zeynep ul > li > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgaakk',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .zeynep ul > li > a',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbgaah',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .zeynep ul > li > a:hover',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fonts',
                'label' => __('Typography', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep ul > li > a',
            ]
        );
        $this->add_responsive_control(
            'sdpda',
            [
                'label' => esc_html__('Item Padding', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .zeynep ul > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );
        $this->add_responsive_control(
            'sdpd',
            [
                'label' => esc_html__('Item Margin', 'thepack'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .zeynep ul > li > a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ]
            ]
        );

        $this->add_responsive_control(
            'dropwi',
            [
                'label' => __('DropDown Width', 'multi-level-pop-menu'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .zeynep' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'drop',
            [
                'label' => __('DropDown BG', 'multi-level-pop-menu'),
                'type' => \Elementor\Controls_Manager::HEADING,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbg',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .zeynep',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'droborder',
                'label' => __('Main Border', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep ul > li > a',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'sub_menu_style',
            [
                'label' => __('Sub Main Menu', 'multi-level-pop-menu'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nsav_fontsaaa',
                'label' => __('Active Typography', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep .submenu-header > a',
            ]
        );
        $this->add_control(
            'sbtn_color',
            [
                'label' => __('Active Color', 'multi-level-pop-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .zeynep .submenu-header > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbaaag',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .zeynep .submenu-header > a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'droborderaaa',
                'label' => __('Active Border', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep .submenu-header > a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nsaav_fontsaaaa',
                'label' => __('Typography', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep .submenu.opened ul > li > a',
            ]
        );
        $this->add_control(
            'sabtn_colora',
            [
                'label' => __('Color', 'multi-level-pop-menu'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .zeynep .submenu.opened ul > li > a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'dropbaaaga',
                'label' => __('Main BG', 'multi-level-pop-menu'),
                'types' => ['classic', 'gradient'],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .zeynep .submenu.opened ul > li > a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'droborderaasa',
                'label' => __('Active Border', 'multi-level-pop-menu'),
                'selector' => '{{WRAPPER}} .zeynep .submenu.opened ul > li > a',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {

        $settings = $this->get_settings();
        $main_menu = $settings['main_nav'];

        ?>
        <section class="multi-level-pop-menu-addons">
            <div class="zeynep">
                <?php
                echo str_replace(['menu-item-has-children'], ['has-submenu'],
                    wp_nav_menu(array(
                            'container' => false,
                            'echo' => false,
                            'menu' => $main_menu,
                            'menu_id' => 'main-menu',
                            'fallback_cb' => 'multi_level_pop_menu_no_main_nav',
                            'items_wrap' => '<ul>%3$s</ul>',
                        )
                    ));
                ?>

            </div>

            <main>
                <?php if ($settings['btn_icon'] == 'yes'){?>
                <button type="button" class="btn-open first"><?php echo esc_html($settings['btn']);?></button>
                <?php } else {?>
                 <button type="button" class="btn-open first">
                     <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                 </button>
                <?php }?>
            </main>

            <div class="zeynep-overlay"></div>
        </section>
    <?php }

}

Plugin::instance()->widgets_manager->register(new multi_level_pop_menu_addons());