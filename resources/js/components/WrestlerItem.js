import axios from 'axios'
import React, { Component } from 'react'

class WrestlerItem extends Component {
  constructor (props) {
    super(props)
    this.state = {
      wrestler: {},
      tasks: [],
      title: '',
      errors: []
    }
  }

  componentDidMount () {
    const { ring_name } = this.props.match.params

    axios.get(`/api/wrestlers/${ring_name}`).then(response => {
      this.setState({
        wrestler: response.data,
      })
    })
  }

  render () {
    const { wrestler, tasks } = this.state

    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-8'>
            <div className='card'>
              <div className='card-header'>{wrestler.name}</div>
              <div className='card-body'>
                <p>{wrestler.ring_name}</p>
                <hr />
              </div>
            </div>
          </div>
        </div>
      </div>
    )
  }
}

export default WrestlerItem