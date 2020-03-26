<?php

namespace InstagramFollowers\Response\Models;

use InstagramFollowers\Response;

/**
 * Class UserModel
 *
 * @method bool hasAccountType()
 * @method bool isAccountType()
 * @method int getAccountType()
 * @method $this setAccountType(int $value)
 * @method $this unsetAccountType()
 * @method bool hasAllowedCommenterType()
 * @method bool isAllowedCommenterType()
 * @method string getAllowedCommenterType()
 * @method $this setAllowedCommenterType(string $value)
 * @method $this unsetAllowedCommenterType()
 * @method bool hasAllowContactsSync()
 * @method bool isAllowContactsSync()
 * @method bool getAllowContactsSync()
 * @method $this setAllowContactsSync(bool $value)
 * @method $this unsetAllowContactsSync()
 * @method bool hasCanBoostPost()
 * @method bool isCanBoostPost()
 * @method bool getCanBoostPost()
 * @method $this setCanBoostPost(bool $value)
 * @method $this unsetCanBoostPost()
 * @method bool hasCanHideCategory()
 * @method bool isCanHideCategory()
 * @method bool getCanHideCategory()
 * @method $this setCanHideCategory(bool $value)
 * @method $this unsetCanHideCategory()
 * @method bool hasCanHidePublicContacts()
 * @method bool isCanHidePublicContacts()
 * @method bool getCanHidePublicContacts()
 * @method $this setCanHidePublicContacts(bool $value)
 * @method $this unsetCanHidePublicContacts()
 * @method bool hasCanSeeOrganicInsights()
 * @method bool isCanSeeOrganicInsights()
 * @method bool getCanSeeOrganicInsights()
 * @method $this setCanSeeOrganicInsights(bool $value)
 * @method $this unsetCanSeeOrganicInsights()
 * @method bool hasCanSeePrimaryCountryInSettings()
 * @method bool isCanSeePrimaryCountryInSettings()
 * @method bool getCanSeePrimaryCountryInSettings()
 * @method $this setCanSeePrimaryCountryInSettings(bool $value)
 * @method $this unsetCanSeePrimaryCountryInSettings()
 * @method bool hasCountryCode()
 * @method bool isCountryCode()
 * @method int getCountryCode()
 * @method $this setCountryCode(int $value)
 * @method $this unsetCountryCode()
 * @method bool hasFullName()
 * @method bool isFullName()
 * @method string getFullName()
 * @method $this setFullName(string $value)
 * @method $this unsetFullName()
 * @method bool hasHasAnonymousProfilePicture()
 * @method bool isHasAnonymousProfilePicture()
 * @method bool getHasAnonymousProfilePicture()
 * @method $this setHasAnonymousProfilePicture(bool $value)
 * @method $this unsetHasAnonymousProfilePicture()
 * @method bool hasHasPlacedOrders()
 * @method bool isHasPlacedOrders()
 * @method bool getHasPlacedOrders()
 * @method $this setHasPlacedOrders(bool $value)
 * @method $this unsetHasPlacedOrders()
 * @method bool hasInteropMessagingUserFbid()
 * @method bool isInteropMessagingUserFbid()
 * @method int getInteropMessagingUserFbid()
 * @method $this setInteropMessagingUserFbid(int $value)
 * @method $this unsetInteropMessagingUserFbid()
 * @method bool hasIsBusiness()
 * @method bool isIsBusiness()
 * @method bool getIsBusiness()
 * @method $this setIsBusiness(bool $value)
 * @method $this unsetIsBusiness()
 * @method bool hasIsCallToActionEnabled()
 * @method bool isIsCallToActionEnabled()
 * @method bool getIsCallToActionEnabled()
 * @method $this setIsCallToActionEnabled(bool $value)
 * @method $this unsetIsCallToActionEnabled()
 * @method bool hasIsPrivate()
 * @method bool isIsPrivate()
 * @method bool getIsPrivate()
 * @method $this setIsPrivate(bool $value)
 * @method $this unsetIsPrivate()
 * @method bool hasIsUsingUnifiedInboxForDirect()
 * @method bool isIsUsingUnifiedInboxForDirect()
 * @method bool getIsUsingUnifiedInboxForDirect()
 * @method $this setIsUsingUnifiedInboxForDirect(bool $value)
 * @method $this unsetIsUsingUnifiedInboxForDirect()
 * @method bool hasIsVerified()
 * @method bool isIsVerified()
 * @method bool getIsVerified()
 * @method $this setIsVerified(bool $value)
 * @method $this unsetIsVerified()
 * @method bool hasNametag()
 * @method bool isNametag()
 * @method \InstagramFollowers\Response\Models\NametagModel getNametag()
 * @method $this setNametag(\InstagramFollowers\Response\Models\NametagModel $value)
 * @method $this unsetNametag()
 * @method bool hasNationalNumber()
 * @method bool isNationalNumber()
 * @method int getNationalNumber()
 * @method $this setNationalNumber(int $value)
 * @method $this unsetNationalNumber()
 * @method bool hasPageId()
 * @method bool isPageId()
 * @method string getPageId()
 * @method $this setPageId(string $value)
 * @method $this unsetPageId()
 * @method bool hasPageName()
 * @method bool isPageName()
 * @method string getPageName()
 * @method $this setPageName(string $value)
 * @method $this unsetPageName()
 * @method bool hasPhoneNumber()
 * @method bool isPhoneNumber()
 * @method string getPhoneNumber()
 * @method $this setPhoneNumber(string $value)
 * @method $this unsetPhoneNumber()
 * @method bool hasPk()
 * @method bool isPk()
 * @method int getPk()
 * @method $this setPk(int $value)
 * @method $this unsetPk()
 * @method bool hasProfessionalConversionSuggestedAccountType()
 * @method bool isProfessionalConversionSuggestedAccountType()
 * @method int getProfessionalConversionSuggestedAccountType()
 * @method $this setProfessionalConversionSuggestedAccountType(int $value)
 * @method $this unsetProfessionalConversionSuggestedAccountType()
 * @method bool hasProfilePicId()
 * @method bool isProfilePicId()
 * @method string getProfilePicId()
 * @method $this setProfilePicId(string $value)
 * @method $this unsetProfilePicId()
 * @method bool hasProfilePicUrl()
 * @method bool isProfilePicUrl()
 * @method string getProfilePicUrl()
 * @method $this setProfilePicUrl(string $value)
 * @method $this unsetProfilePicUrl()
 * @method bool hasReelAutoArchive()
 * @method bool isReelAutoArchive()
 * @method string getReelAutoArchive()
 * @method $this setReelAutoArchive(string $value)
 * @method $this unsetReelAutoArchive()
 * @method bool hasShouldShowCategory()
 * @method bool isShouldShowCategory()
 * @method bool getShouldShowCategory()
 * @method $this setShouldShowCategory(bool $value)
 * @method $this unsetShouldShowCategory()
 * @method bool hasShouldShowPublicContacts()
 * @method bool isShouldShowPublicContacts()
 * @method bool getShouldShowPublicContacts()
 * @method $this setShouldShowPublicContacts(bool $value)
 * @method $this unsetShouldShowPublicContacts()
 * @method bool hasShowInsightsTerms()
 * @method bool isShowInsightsTerms()
 * @method bool getShowInsightsTerms()
 * @method $this setShowInsightsTerms(bool $value)
 * @method $this unsetShowInsightsTerms()
 * @method bool hasTotalIgtvVideos()
 * @method bool isTotalIgtvVideos()
 * @method int getTotalIgtvVideos()
 * @method $this setTotalIgtvVideos(int $value)
 * @method $this unsetTotalIgtvVideos()
 * @method bool hasUsername()
 * @method bool isUsername()
 * @method string getUsername()
 * @method $this setUsername(string $value)
 * @method $this unsetUsername()
 *
 * @package InstagramFollowers\Response\Models
 */
class UserModel extends Response {

    const JSON_PROPERTY_MAP = [
        "pk" => "int",
        "username" => "string",
        "full_name" => "string",
        "is_private" => "bool",
        "profile_pic_url" => "string",
        "profile_pic_id" => "string",
        "is_verified" => "bool",
        "has_anonymous_profile_picture" => "bool",
        "can_boost_post" => "bool",
        "page_name" => "string",
        "page_id" => "string",
        "is_business" => "bool",
        "account_type" => "int",
        "professional_conversion_suggested_account_type" => "int",
        "is_call_to_action_enabled" => "bool",
        "can_see_organic_insights" => "bool",
        "show_insights_terms" => "bool",
        "total_igtv_videos" => "int",
        "reel_auto_archive" => "string",
        "has_placed_orders" => "bool",
        "allowed_commenter_type" => "string",
        "nametag" => "NametagModel",
        "can_hide_category" => "bool",
        "can_hide_public_contacts" => "bool",
        "should_show_category" => "bool",
        "should_show_public_contacts" => "bool",
        "is_using_unified_inbox_for_direct" => "bool",
        "interop_messaging_user_fbid" => "int",
        "can_see_primary_country_in_settings" => "bool",
        "allow_contacts_sync" => "bool",
        "phone_number" => "string",
        "country_code" => "int",
        "national_number" => "int"
    ];
}