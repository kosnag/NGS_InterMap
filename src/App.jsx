import React, { Fragment, useEffect } from 'react';
import MenuLegend from './components/menu/legend';
import MenuSettings from './components/menu/settings';
import Map from './components/map';
import NavBar from './components/navbar';

import './assets/js/i18n';
import { useTranslation } from "react-i18next";

const App = () => {
  const {t} = useTranslation("ui");

  useEffect(() => {
    document.title = t("ui:page_title")
  });

  useEffect(() => {
    if (localStorage.getItem("settings") === null) {
      fetch ("./assets/data/settings.json").then(response => response.json().then(data => { 
        localStorage.setItem("settings", JSON.stringify(data))
      }))
    };
  }, []);

  return (
    <Fragment>
      <Map/>
      <NavBar/>
      <container>
        <MenuLegend/>
        <MenuSettings/>
      </container>
    </Fragment>
  );
}

export default App;