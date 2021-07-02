import 'react-native-gesture-handler';
import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import StackNavigation from './src/navigation/DrawerNavigation';
import storeRed from './src/store/Storage'
import { Provider } from 'mobx-react';
import { configure } from 'mobx';
configure({
  enforceActions:'never'
});
export default function App() {
  const stores = {storeRed}
  
  return (
    <Provider {...stores}>
      <NavigationContainer>
          <StackNavigation/>
      </NavigationContainer>
    </Provider>

  );
}
