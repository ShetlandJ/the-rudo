import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { AppContainer } from 'react-hot-loader'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import NewProject from './NewProject'
import WrestlerList from './WrestlerList'
import Wrestler from './Wrestler'

class App extends Component {
  render () {
    return (
      <AppContainer>
        <BrowserRouter>
          <div>
            <Header />
            <Switch>
              <Route exact path='/' component={WrestlerList} />
              <Route path='/create' component={NewProject} />
              <Route path='/:ring_name' component={Wrestler} />
            </Switch>
          </div>
        </BrowserRouter>
      </AppContainer>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))

if (process.env.NODE_ENV === 'development' && module.hot) {
  module.hot.accept();
}