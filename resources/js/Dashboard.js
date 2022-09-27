import React, { Component } from "react";
import ReactDOM from "react-dom";
import Button from "@mui/material/Button";
import Grid from "@mui/material/Grid";
import Snackbar from "@mui/material/Snackbar";
import axios from "axios";
import { isPointWithinRadius } from "geolib";

class Dashboard extends Component {
    state = {
        lat: null,
        lng: null,
        open: false,
        msg: "",
        disable: false,
    };
    componentDidMount = () => {
        setTimeout(() => {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.setState({
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    });
                });
            } else {
                alert("Location not activated");
            }
        }, 500);
    };
    render() {
        const { lat, lng, open, msg, disable } = this.state;
        const absen = () => {
            if (lat && lng) {
                if (
                    isPointWithinRadius(
                        { latitude: lat, longitude: lng },
                        { latitude: -6.225714, longitude: 106.850357 },
                        3000
                    )
                ) {
                    const data = {
                        userId: document
                            .querySelector("meta[name='user_id']")
                            .getAttribute("content"),
                        lat,
                        lng,
                    };
                    axios
                        .post("api/absen", data)
                        .then((response) => {
                            this.setState({
                                open: true,
                                msg: "Terimakasih",
                                disable: true,
                            });
                            var tinung = `${window.location.origin}/terimakasih.ogg`;
                            var audio = document.createElement("audio");

                            audio.autoplay = true;
                            audio.load();
                            audio.addEventListener(
                                "load",
                                function() {
                                    audio.play();
                                },
                                true
                            );
                            audio.src = tinung;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                } else {
                    this.setState({
                        open: true,
                        msg: "Lokasi mati atau jauh dari kantor",
                    });
                }
            } else {
                this.setState({
                    open: true,
                    msg: "Lokasi mati atau jauh dari kantor",
                });
            }
        };
        return (
            <>
                <Grid
                    container
                    direction="row"
                    justifyContent="center"
                    alignItems="center"
                    spacing={2}
                >
                    <Grid item sm={12} md={6} style={{ marginTop: 20 }}>
                        <Button
                            variant="contained"
                            onClick={absen}
                            disabled={disable}
                        >
                            Absen
                        </Button>
                    </Grid>
                </Grid>
                <Snackbar
                    open={open}
                    autoHideDuration={6000}
                    // onClose={handleClose}
                    message={msg}
                    // action={action}
                />
            </>
        );
    }
}
export default Dashboard;

if (document.getElementById("dashboard")) {
    ReactDOM.render(<Dashboard />, document.getElementById("dashboard"));
}
