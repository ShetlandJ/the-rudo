import axios from 'axios'
import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'

function WrestlerListItem({ wrestler }) {

  return (
    <div className='wrestler-list-item'>
      <div className='wrestler-list-image'></div>
      <h2 className='wrestler-list-title'>{wrestler.ring_name}</h2>
    </div>
  )
}
export default WrestlerListItem
