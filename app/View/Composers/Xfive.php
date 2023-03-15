<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class XfiveContents extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-flux',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'XfiveContents' => $this->XfiveContents(),
        ];
    }

    public function XfiveContents()
    {
        $data = [];
        $flexible_content = get_field('page_content');
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'banner_style' => $content['banner_style'],
                        'banner_height' => $content['banner_height'],
                        'scroll_to_discover' => $content['scroll_to_discover'],
                        'background_image' => $content['background_image'],
                        'heading' => $content['heading'],
                        'video_title' => $content['video_title'],   
                        'video_url' => $content['video_url'],
                        'short_video_url' => $content['short_video_url'],
                        'logo' => $content['logo'],
                        'explore_link' => $content['explore_link'],
                        'description' => $content['description'],
                        'id' => $content['id'],                                         
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='discover_with_sites'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'content' => $content['content'],
                        'button' => $content['button'],
                        'style_slider' => $content['style_slider'],
                        'list_sites' => $content['list_sites'], 
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => $content['section_color'],
                        
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='simple_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'content_style' => $content['content_style'],
                        'icon_style' => $content['icon_style'],
                        'heading' => $content['heading'],
                        'content' => $content['content'],   
                        'button' => $content['button'], 
                        'icon_image' => $content['icon_image'],                                           
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => $content['section_color'],
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='full_width_image_with_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'content_style' => $content['content_style'],
                        'content_align' => $content['content_align'],
                        'background_image' => $content['background_image'],
                        'icon_image' => $content['icon_image'],   
                        'pre_heading' => $content['pre_heading'],
                        'heading' => $content['heading'], 
                        'content' => $content['content'], 
                        'button_1' => $content['button_1'], 
                        'button_2' => $content['button_2'],                                          
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => $content['section_color'],
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='image_boxes'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'boxes' => $content['boxes'],                                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='testimonials'){

                    $all_testimonial = array();
                    $usp_args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'testimonial_category', //double check your taxonomy name in you dd 
                                'field'    => 'id',
                                'terms'    => $content['testimonial_category'],
                            ),
                        ),

                    );
                    $usp_query = new \WP_Query(  $usp_args );

                    if($usp_query->have_posts()) {
                        while ( $usp_query->have_posts() ) : $usp_query->the_post();                            
                            $all_testimonial[] = array(
                                'id' => get_the_ID(),
                                'title' => get_the_title(),                               
                                'content' => get_the_content(),                             
                                'url' => get_the_permalink(),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'bg_image' => $content['bg_image'],
                        'bg_color_style' => $content['bg_color_style'], 
                        'testimonial_category' => $content['testimonial_category'],
                        'testimonial_data' => $all_testimonial,                                     
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='image_boxes_with_tab'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'boxes' => $content['boxes'],                                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='gallery'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'content' => $content['content'],
                        'images' => $content['images'],     
                        'scrollbar' => $content['scrollbar'],    
                        'image_size_auto' => $content['image_size_auto'],                                                        
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='image_with_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image_position' => $content['image_position'],
                        'contact' => $content['contact'],    
                        'background_color' => $content['background_color'],   
                        'map_iframe' => $content['map_iframe'],                 
                        'icon_image' =>$content['icon_image'],
                        'image' =>$content['image'],
                        'iframe_url' => $content['iframe_url'],
                        'pre_heading' =>$content['pre_heading'],     
                        'heading' =>$content['heading'], 
                        'content' =>$content['content'],                        
                        'readmore_link' =>$content['readmore_link'], 
                        'button' =>$content['button'], 
                        'email' =>$content['email'], 
                        'telephone' =>$content['telephone'],
                        'social_link' =>$content['social_link'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='discover_properties'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'icon_image' => $content['icon_image'],
                        'heading' =>$content['heading'],     
                        'content' =>$content['content'], 
                        'properties_list' =>$content['properties_list'],                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='page_grid'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'background_style' => $content['background_style'],
                        'heading' =>$content['heading'],     
                        'content' =>$content['content'], 
                        'grid' =>$content['grid'],                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='simple_tab'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'tabs' => $content['tabs'],                                                             
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='press_tab'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'tabs' => $content['tabs'],                                                             
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='gallery_with_fancybox'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'tabs' => $content['tabs'],                                                             
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }     
                elseif($content['acf_fc_layout']=='accordion'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'data' => $content['data'],                                                             
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }      
                elseif($content['acf_fc_layout']=='image_slider_with_sidebar_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image_slider' => $content['image_slider'],   
                        'heading' => $content['heading'],
                        'content' => $content['content'],
                        'explore_link' => $content['explore_link'],                                                          
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='rates_table'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'section_style' => $content['section_style'],   
                        'heading' => $content['heading'],
                        'tabel_heading' => $content['tabel_heading'],
                        'tabel_content' => $content['tabel_content'],
                        'tabel_tagline' => $content['tabel_tagline'],
                        'download_rates' => $content['download_rates'],                                                          
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }     
                elseif($content['acf_fc_layout']=='terms_for_rates'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'section_style' => $content['section_style'],   
                        'heading' => $content['heading'],
                        'terms_of_rates' => $content['terms_of_rates'],                                                        
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='faq'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'section_style' => $content['section_style'],   
                        'heading' => $content['heading'],
                        'faq_section' => $content['faq_section'],                                                        
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='discover_offers_card'){

                    $all_offers = array();
                    $usp_args = array(
                        'post_type' => 'offer',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'offer_category',
                                'field'    => 'id',
                                'terms'    => $content['offers_card'],
                            ),
                        ),

                    );
                    $usp_query = new \WP_Query(  $usp_args );

                    if($usp_query->have_posts()) {
                        while ( $usp_query->have_posts() ) : $usp_query->the_post();   

                        $fea_img = get_template_directory_uri().'/resources/images/honeymoon-offer.jpg';
                        if(get_the_post_thumbnail_url()){
                            $fea_img = get_the_post_thumbnail_url();
                        }                         
                        $all_offers[] = array(
                            'id' => get_the_ID(),
                            'fea_img' => $fea_img,
                            'title' => get_the_title(),                               
                            'content' => get_the_content(),                             
                            'url' => get_the_permalink(),
                        );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'all_offers' => $all_offers,                                     
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='stay_list'){

                    $accommodations = array();
                    $usp_args = array(
                        'post_type' => 'accommodation',
                        'posts_per_page' => '2',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'accommodation_category',
                                'field'    => 'id',
                                'terms'    => $content['stay_card'],
                            ),
                        ),

                    );
                    $usp_query = new \WP_Query(  $usp_args );

                    if($usp_query->have_posts()) {
                        while ( $usp_query->have_posts() ) : $usp_query->the_post();   

                        $fea_img = get_template_directory_uri().'/resources/images/honeymoon-offer.jpg';
                        if(get_the_post_thumbnail_url()){
                            $fea_img = get_the_post_thumbnail_url();
                        }                         
                        $accommodations[] = array(
                            'id' => get_the_ID(),
                            'fea_img' => $fea_img,
                            'title' => get_the_title(),                               
                            'content' => get_the_content(),                             
                            'url' => get_the_permalink(),
                            'stay_guest' => get_field('stay_guest',get_the_id()),
                            'stay_beds' => get_field('stay_beds',get_the_id()),
                            'stay_person' => get_field('stay_person',get_the_id()),
                        );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'accommodations' => $accommodations,                                     
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='experiences_with_fancybox'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'grid' => $content['grid'],   
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                        'section_color' => $content['section_color']
                    ];
                    array_push($data, $this_content);
                }elseif($content['acf_fc_layout']=='typical_day_content'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],   
                        'typical_day' => $content['typical_day'],   
                        'link' => $content['link'],                                                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                        
                    ];
                    array_push($data, $this_content);
                }elseif($content['acf_fc_layout']=='image_with_content_popup'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image_position' => $content['image_position'],   
                        'background_color' => $content['background_color'],   
                        'pre_heading' => $content['pre_heading'],   
                        'heading' => $content['heading'],   
                        'image' => $content['image'],   
                        'sort_description' => $content['sort_description'],   
                        'display_popup' => $content['display_popup'],   
                        'popup_heading' => $content['popup_heading'],   
                        'popup_description' => $content['popup_description'],   
                        'popup_slider' => $content['popup_slider'],   
                        'link' => $content['link'],                                                                                
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                        
                    ];
                    array_push($data, $this_content);
                }elseif($content['acf_fc_layout']=='meet_the_team'){                    
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'our_team' => $content['our_team'],                                          
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                        
                    ];
                    array_push($data, $this_content);
                }elseif($content['acf_fc_layout']=='contact_details'){                    
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'image' => $content['image'],                                          
                        'contact_details' => $content['contact_details'],                                          
                        'social_media' => $content['social_media'],                                          
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                        
                    ];
                    array_push($data, $this_content);
                }            
                
            }
        }
        return $data;
    }
}
