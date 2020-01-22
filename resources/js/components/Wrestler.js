import axios from 'axios'
import React, { useState, useEffect } from 'react';
import WrestlerProfile from "./Wrestler/WrestlerProfile";
import WrestlerStatusList from "./Wrestler/WrestlerStatusList";

export default function Wrestler(props) {
  const [wrestler, setWrestler] = useState([]);
  const [loading, setLoading] = useState(true);

  const { ring_name } = props.match.params;
  const fetchData = async () => {
    const wrestler = await axios.get(`/api/wrestlers/${ring_name}`).then(response => response.data);

    setWrestler(wrestler);
    setLoading(false);
  }

  useEffect(() => {
    fetchData();
  }, [])

  return (
    <div className='container py-4'>
      {!loading && (
        <div>
          <WrestlerProfile wrestler={wrestler} />
          <hr />
          <WrestlerStatusList wrestler={wrestler} />
        </div>
      )}
      {loading && (
        <div>LOADING</div>
      )}
    </div>
  )
}
