import axios from 'axios'
import React, { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import WrestlerListItem from './WrestlerListItem.js';

function WrestlerList() {
  const [wrestlers, setWrestlers] = useState([]);

  const fetchData = async () => {
    const wrestlers = await axios.get('/api/wrestlers').then(response => response.data);

    setWrestlers(wrestlers);
  }

  useEffect(() => {
    fetchData();
  }, [])


  return (
    <div className='container py-4'>
      <div className='row justify-content-center'>
        <div className='col-md-8'>
          {/* <div className='card'> */}
          <ul className='wrestler-list'>
            {wrestlers.map(wrestler => (
              <Link
                className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                to={`/${wrestler.uuid}`}
                key={wrestler.uuid}
              >
                <WrestlerListItem
                  wrestler={wrestler}
                />
              </Link>
            ))}
          </ul>
          {/* </div> */}
        </div>
      </div>
    </div>
  )
}

export default WrestlerList
