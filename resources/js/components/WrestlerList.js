import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class WrestlerList extends Component {
  constructor () {
    super()
    this.state = {
      wrestlers: []
    }
  }

  componentDidMount () {
    axios.get('/api/wrestlers').then(response => {
      this.setState({
        wrestlers: response.data
      })
    })
  }

  render () {
    const { wrestlers } = this.state
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='card'>
              <div className='card-header'>All wrestlers</div>
              <div className='card-body'>
                <Link className='btn btn-primary btn-sm mb-3' to='/create'>
                  Add new wrestler
                </Link>
                <ul className='list-group list-group-flush'>
                  {wrestlers.map(wrestler => (
                    <Link
                      className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
                      to={`/${wrestler.uuid}`}
                      key={wrestler.uuid}
                    >
                      {wrestler.ring_name}
                    </Link>
                  ))}
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default WrestlerList
