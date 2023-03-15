<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class xfiveContent extends Composer
{

    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-xfive',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'xfiveContent' => $this->xfiveContent(),
        ];
    }

    public function xfiveContent()
    {
        $data = [];
        $flexible_content = get_field('page_content');
        if($flexible_content){
            foreach($flexible_content as $content) {
                if($content['acf_fc_layout']=='banner'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'select_style' => $content['select_style'],
                        'banner_height' => $content['banner_height'],
                        'heading' => $content['heading'],
                        'sub_heading' => $content['sub_heading'],
                        'discripction' => $content['discripction'],
                        'button_1' => $content['button_1'],
                        'button_2' => $content['button_2'],
                        'image' => $content['image'],
                        'id' => $content['id'],                                         
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='about'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'sub_heading' => $content['sub_heading'],
                        'description' => $content['description'],
                        'partner_saction' => $content['partner_saction'],
                        'meet_our_team' => $content['meet_our_team'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'], 
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='our_practice_area'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'sub_heading' => $content['sub_heading'],
                        'services' => $content['services'],
                        'view_all_our_practice_areas' => $content['view_all_our_practice_areas'],
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'], 
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='contact_info'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'select_layout' => $content['select_layout'],
                        'heading' => $content['heading'],
                        'background_image' => $content['background_image'],
                        'contact_info' => $content['contact_info'],
                        'week__hours' => $content['week__hours'],   
                        'book_online' => $content['book_online'],                                      
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section'],
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='services'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'services_detials' => $content['services_detials'],                                                               
                        'button_1' => $content['button_1'],                                                               
                        'button_2' => $content['button_2'],                                                               
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='meet_our_team'){
                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'meet_our_team' => $content['meet_our_team'],                                                            
                        'id' => $content['id'],
                        'extra_class' => $content['extra_class'],
                        'hide_section' => $content['hide_section']
                    ];
                    array_push($data, $this_content);
                }
                elseif($content['acf_fc_layout']=='testimonial'){
                    $all_testimonial = array();
                    $usp_args = array(
                        'post_type' => 'testimonial',
                        'posts_per_page' => '-1',
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC',
                    );
                    $usp_query = new \WP_Query(  $usp_args );
                    if($usp_query->have_posts()) {
                        while ( $usp_query->have_posts() ) : $usp_query->the_post();                            
                            $all_testimonial[] = array(
                                'id' => get_the_ID(),
                                'content'=>get_the_content(),
                                'theme_image'=>get_the_post_thumbnail_url(),
                                'title' => get_field('name'),                                                     
                                'video' => get_field('video'),                            
                                'rating' => get_field('rating'),                            
                                'extra_id' => get_field('id'),
                                'extra_class' => get_field('extra_class'),
                                'hide_saction' => get_field('hide_saction'),
                            );
                        endwhile;
                        wp_reset_postdata();
                    }

                    $this_content = (object) [
                        'layout' => $content['acf_fc_layout'],
                        'heading' => $content['heading'],
                        'sub_heading' => $content['sub_heading'], 
                        'hide_testimonial' => $content['hide_testimonial'],
                        'background_image' => $content['background_image'],
                        'testimonial_data' => $all_testimonial,                                     
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
