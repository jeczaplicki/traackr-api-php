<?php

namespace Traackr;

class Posts extends TraackrApiObject {

   public static function lookup($p = array(
      'is_tag_prefix' => false,
      'lang' => 'all',
      'include_entities' => false,
      'count' => 25, 'page' => 0) ) {

      $posts = new Posts();
      $p = $posts->addCustomerKey($p);

      // Sanitize default values
      $p['is_tag_prefix'] = $posts->convertBool($p, 'is_tag_prefix');
      $p['include_entities'] = $posts->convertBool($p, 'include_entities');
      $p['include_brand_content'] = $posts->convertBool($p, 'include_brand_content');
      $p['include_shared_content'] = $posts->convertBool($p, 'include_shared_content');

      // support for multi params
      if ( isset($p['influencers']) ) {
         $p['influencers'] = is_array($p['influencers']) ?
            implode(',', $p['influencers']) : $p['influencers'];
      }
      if ( isset($p['tags']) ) {
         $p['tags'] = is_array($p['tags']) ?
            implode(',', $p['tags']) : $p['tags'];
      }
      if ( isset($p['tags_exclusive']) ) {
         $p['tags_exclusive'] = is_array($p['tags_exclusive']) ?
            implode(',', $p['tags_exclusive']) : $p['tags_exclusive'];
      }
      if ( isset($p['root_urls_inclusive']) ) {
         $p['root_urls_inclusive'] = is_array($p['root_urls_inclusive']) ?
               implode(',', $p['root_urls_inclusive']) : $p['root_urls_inclusive'];
      }
      if ( isset($p['root_urls_exclusive']) ) {
         $p['root_urls_exclusive'] = is_array($p['root_urls_exclusive']) ?
            implode(',', $p['root_urls_exclusive']) : $p['root_urls_exclusive'];
      }

      return $posts->post(TraackrApi::$apiBaseUrl.'posts/lookup', $p);

   }

   public static function search($p = array(
      'is_tag_prefix' => false,
      'lang' => 'all',
      'include_keyword_matches' => false,
      'include_entities' => false,
      'enable_keyword_aggregation' => false,
      'enable_influencer_aggregation' => false,
      'enable_domain_aggregation' => false,
      'enable_monthly_aggregation' => false,
      'enable_weekly_aggregation' => false,
      'enable_daily_aggregation' => false,
      'count' => 25, 'page' => 0, 'sort' => 'date') ) {

      $posts = new Posts();
      $p = $posts->addCustomerKey($p);
      $posts->checkRequiredParams($p, array('keywords'));

      // Sanitize default values
      $p['is_tag_prefix'] = $posts->convertBool($p, 'is_tag_prefix');
      $p['include_keyword_matches'] = $posts->convertBool($p, 'include_keyword_matches');
      $p['include_entities'] = $posts->convertBool($p, 'include_entities');
      $p['enable_keyword_aggregation'] = $posts->convertBool($p, 'enable_keyword_aggregation');
      $p['enable_influencer_aggregation'] = $posts->convertBool($p, 'enable_influencer_aggregation');
      $p['enable_domain_aggregation'] = $posts->convertBool($p, 'enable_domain_aggregation');
      $p['enable_monthly_aggregation'] = $posts->convertBool($p, 'enable_monthly_aggregation');
      $p['enable_weekly_aggregation'] = $posts->convertBool($p, 'enable_weekly_aggregation');
      $p['enable_daily_aggregation'] = $posts->convertBool($p, 'enable_daily_aggregation');
      $p['include_brand_content'] = $posts->convertBool($p, 'include_brand_content');
      $p['include_shared_content'] = $posts->convertBool($p, 'include_shared_content');

      // support for multi params
      $p['keywords'] = is_array($p['keywords']) ?
         implode(',', $p['keywords']) : $p['keywords'];
      if ( isset($p['influencers']) ) {
         $p['influencers'] = is_array($p['influencers']) ?
            implode(',', $p['influencers']) : $p['influencers'];
      }
      if ( isset($p['tags']) ) {
         $p['tags'] = is_array($p['tags']) ?
            implode(',', $p['tags']) : $p['tags'];
      }
      if ( isset($p['tags_exclusive']) ) {
         $p['tags_exclusive'] = is_array($p['tags_exclusive']) ?
            implode(',', $p['tags_exclusive']) : $p['tags_exclusive'];
      }
      if ( isset($p['exclusion_keywords']) ) {
         $p['exclusion_keywords'] = is_array($p['exclusion_keywords']) ?
            implode(',', $p['exclusion_keywords']) : $p['exclusion_keywords'];
      }
      if ( isset($p['root_urls_inclusive']) ) {
         $p['root_urls_inclusive'] = is_array($p['root_urls_inclusive']) ?
               implode(',', $p['root_urls_inclusive']) : $p['root_urls_inclusive'];
      }
      if ( isset($p['root_urls_exclusive']) ) {
         $p['root_urls_exclusive'] = is_array($p['root_urls_exclusive']) ?
            implode(',', $p['root_urls_exclusive']) : $p['root_urls_exclusive'];
      }

       return $posts->post(TraackrApi::$apiBaseUrl.'posts/search', $p);

   }
}
