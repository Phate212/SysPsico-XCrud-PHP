/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
config.extraPlugins = 'wordcount';

config.wordcount = {

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,
    
    // Maximum allowed Word Count
    maxWordCount: 4,

    // Maximum allowed Char Count
    maxCharCount: 10
};


CKEDITOR.editorConfig = function( config ) {
	config.extraPlugins = 'maxlength';
};
