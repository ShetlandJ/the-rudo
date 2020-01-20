// import axios from 'axios'
// import { Link } from 'react-router-dom'
// import WrestlerListItem from './WrestlerListItem/WrestlerListItem';
// import Button from '@material-ui/core/Button';

// function WrestlerList() {


//   return (
//     <div className='container py-4'>
//       <div className='row justify-content-center'>
//         <div className='col-md-8'>
//           {/* <div className='card'> */}
//           <ul className='wrestler-list'>
//             {wrestlers.map(wrestler => (
//               <Link
//                 className='list-group-item list-group-item-action d-flex justify-content-between align-items-center'
//                 to={`/${wrestler.uuid}`}
//                 key={wrestler.uuid}
//               >
//                 <WrestlerListItem
//                   wrestler={wrestler}
//                 />
//               </Link>
//             ))}
//           </ul>
//           {/* </div> */}
//         </div>
//       </div>
//     </div>
//   )
// }

// export default WrestlerList

import React,  { useState, useEffect } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import List from '@material-ui/core/List';
import ListItem from '@material-ui/core/ListItem';
import ListItemText from '@material-ui/core/ListItemText';
import ListItemAvatar from '@material-ui/core/ListItemAvatar';
import Avatar from '@material-ui/core/Avatar';
import ImageIcon from '@material-ui/icons/Image';
import WorkIcon from '@material-ui/icons/Work';
import BeachAccessIcon from '@material-ui/icons/BeachAccess';

const useStyles = makeStyles(theme => ({
  root: {
    width: '100%',
    maxWidth: 360,
    backgroundColor: theme.palette.background.paper,
  },
}));

export default function WrestlerList() {
  const classes = useStyles();

  const [wrestlers, setWrestlers] = useState([]);
  const [companyString, setCompanyString] = useState([]);

  const fetchData = async () => {
    const wrestlers = await axios.get('/api/wrestlers').then(response => response.data);

    setWrestlers(wrestlers);
  }

  useEffect(() => {
    fetchData();
  }, [])

  const getCompanyString = (wrestler) => {
    const { promotion } = wrestler.currentShow;

    setCompanyString(`${wrestler.currentShow.name}, ${promotion.alias}`)
  }

  return (
    <List className={classes.root}>
      {wrestlers.map((wrestler, index) =>
        <ListItem key={index}>
          <ListItemAvatar>
            <Avatar
            >
              <img
                className='wrestler-list-image'
                src={wrestler.picture}
              />
            </Avatar>
          </ListItemAvatar>
          <ListItemText primary={wrestler.ring_name} secondary={`${wrestler.currentShow.name}, ${wrestler.currentShow.promotion.alias}`} />
        </ListItem>
      )}
    </List>
  );
}