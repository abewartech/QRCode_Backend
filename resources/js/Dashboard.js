import React, { Component } from "react";
import ReactDOM from "react-dom";
import axios from "axios";
import { isPointWithinRadius } from "geolib";
import {
    Card,
    CardContent,
    CardHeader,
    Typography,
    Snackbar,
    Button,
} from "@mui/material";
import dayjs from "dayjs";
import Clock from "react-live-clock";
import customParseFormat from "dayjs/plugin/customParseFormat";
import "dayjs/locale/id";
dayjs.extend(customParseFormat);
dayjs.locale("id");

class Dashboard extends Component {
    state = {
        lat: null,
        lng: null,
        open: false,
        msg: "",
        disable: false,
        isAbsenToday: false,
        jamMasuk: "",
        jamPulang: "",
    };
    componentDidMount = () => {
        const data = {
            userId: document
                .querySelector("meta[name='user_id']")
                .getAttribute("content"),
        };
        axios
            .post("api/checkabsen", data)
            .then((response) => {
                console.log(response.data.message.created_at);
                if (response.data.isAbsen) {
                    this.setState({
                        isAbsenToday: true,
                        jamMasuk: dayjs(
                            response.data.message.created_at
                        ).format("HH:mm:ss"),
                    });
                }
                if (response.data.pulang) {
                    this.setState({
                        jamPulang: dayjs(
                            response.data.pulang.created_at
                        ).format("HH:mm:ss"),
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
            });
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
        const { lat, lng, open, msg, disable, isAbsenToday, jamMasuk, jamPulang } =
            this.state;
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
                                function () {
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
                <div class="container">
                    <div
                        className="row justify-content-center"
                        style={{ marginTop: 20 }}
                    >
                        <div className="col-3">
                            <Button
                                variant="contained"
                                onClick={absen}
                                disabled={disable}
                            >
                                Absen
                            </Button>
                        </div>
                    </div>
                    <div className="row" style={{ marginTop: 120 }}>
                        <div className="col-12">
                            <Card>
                                <CardHeader
                                    title={
                                        <Clock
                                            format={"HH:mm:ss"}
                                            ticking={true}
                                            timezone={"Asia/Jakarta"}
                                        />
                                    }
                                    subheader={dayjs().format(
                                        "dddd, DD MMMM YYYY"
                                    )}
                                />
                                <CardContent>
                                    <div className="row">
                                        <div className="col-7">
                                            <Typography
                                                variant="body1"
                                                color="text.secondary"
                                            >
                                                Status Kehadiran :
                                            </Typography>
                                        </div>
                                        <div className="col-5">
                                            {isAbsenToday ? (
                                                <Typography
                                                    variant="body1"
                                                    color="#00e640"
                                                >
                                                    Sudah Absen
                                                </Typography>
                                            ) : (
                                                <Typography
                                                    variant="body1"
                                                    color="#f22613"
                                                >
                                                    Belum Absen
                                                </Typography>
                                            )}
                                        </div>
                                    </div>
                                    <div className="row mt-2">
                                        <div className="col-7">
                                            <Typography
                                                variant="body2"
                                                color="text.secondary"
                                            >
                                                Waktu Datang :
                                            </Typography>
                                        </div>
                                        <div className="col-5">
                                            <Typography variant="body2">
                                                {jamMasuk}
                                            </Typography>
                                        </div>
                                    </div>
                                    <div className="row mt-1">
                                        <div className="col-7">
                                            <Typography
                                                variant="body2"
                                                color="text.secondary"
                                            >
                                                Waktu Pulang :
                                            </Typography>
                                        </div>
                                        <div className="col-5">
                                            <Typography variant="body2">
                                                {jamPulang}
                                            </Typography>
                                        </div>
                                    </div>
                                </CardContent>
                            </Card>
                        </div>
                    </div>
                </div>

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
