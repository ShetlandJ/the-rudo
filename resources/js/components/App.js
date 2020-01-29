import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { AppContainer } from 'react-hot-loader'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import NewProject from './NewProject'
import WrestlerList from './WrestlerList'
import Wrestler from './Wrestler'
import { Provider } from 'react-redux'
import reducer from './store/reducers'
import { createStore } from 'redux'

const store = createStore(
    reducer,
    window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()
)

class App extends Component {
  render() {
    return (
      <Provider store={store} >
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
      </Provider>
    )
  }
}

ReactDOM.render(<App />, document.getElementById('app'))

if (process.env.NODE_ENV === 'development' && module.hot) {
  module.hot.accept();
}