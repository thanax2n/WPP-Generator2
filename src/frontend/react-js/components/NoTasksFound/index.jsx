import React from 'react'
import { __ } from '@wordpress/i18n'

// const { __ } = wp.i18n // this for translate, because '@wordpress/i18n' does not work to display the translate text

export const NoTasksFound = ({ message }) => {
  return (
    <div className="mxsfwn-menu-item mxsfwn-no-tasks-found">
      <div className="mxsfwn-menu-item-title">
        {message || __('No active tasks found', 'wpp-generator-next')}
      </div>
    </div>
  )
}