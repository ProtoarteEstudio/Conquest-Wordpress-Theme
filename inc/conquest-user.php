<?php
/**
 * conquest user profiles
 *
 * @package conquest
 */


function user_social_fields($profile_fields) {
  // Add new fields
  $profile_fields['twitter'] = 'Twitter Username';
  return $profile_fields;
}
add_filter('user_contactmethods', 'user_social_fields');