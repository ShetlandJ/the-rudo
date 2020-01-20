import axios from 'axios'
import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import WrestlerProfilePicture from './WrestlerProfilePicture';

function WrestlerListItem({ wrestler }) {

  return (
    <div className='wrestler-list-item'>
      <WrestlerProfilePicture wrestler={wrestler} />
      <h2 className='wrestler-list-title'>{wrestler.ring_name}</h2>
    </div>
  )
}
export default WrestlerListItem
